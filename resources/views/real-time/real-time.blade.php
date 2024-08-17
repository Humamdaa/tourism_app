<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Comments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #comments-list {
            list-style-type: none;
            padding: 0;
        }

        #comments-list li {
            background: #f4f4f4;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }

        #comment-form {
            margin-top: 20px;
        }

        #comment-form input,
        #comment-form button {
            padding: 10px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<h1>Real-Time Comments</h1>
<ul id="comments-list">
    @if($com && $com->isNotEmpty())
        <ul>
            @foreach($com as $comment)
                <li>
                    <strong>Comment:</strong> {{ $comment->comment }} <br>
                    <strong>Rate:</strong> {{ $comment->rate }} <br>
                    <strong>Created At:</strong> {{ $comment->created_at }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments found.</p>
    @endif
</ul>


<div id="comment-form">
    <input type="text" id="comment-input" placeholder="Enter your comment"/>
    <button onclick="addComment()">Send</button>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // تهيئة Pusher
    var pusher = new Pusher('b3f3f229d2f1db48dc1a', {
        cluster: 'ap1',
        encrypted: true
    });

    // الاشتراك في قناة التعليقات
    var channel = pusher.subscribe('comments');

    // الاستماع إلى حدث إرسال التعليق
    channel.bind('comment.sent', function (data) {
        addCommentToUI(data.comment);
    });

    // وظيفة لإضافة تعليق إلى واجهة المستخدم
    function addCommentToUI(comment) {
        let commentsList = document.getElementById('comments-list');
        let newComment = document.createElement('li');
        newComment.textContent = `User ${comment.user_id}: ${comment.comment} (Rating: ${comment.rate})`;
        commentsList.appendChild(newComment);
    }

    // جلب التعليقات عند تحميل الصفحة
    // window.onload = function () {
    //     fetch('InsideHotelPage')
    //         .then(response => response.json())
    //         .then(data => {
    //             data.data[1].comment.forEach(comment => {
    //                 addCommentToUI(comment);
    //             });
    //         })
    //         .catch(error => console.error('Error fetching comments:', error));
    // };

    // إرسال التعليق الجديد
    function addComment() {
        let commentInput = document.getElementById('comment-input');
        let commentText = commentInput.value;

        if (commentText) {
            // افتراضياً سيتم إرسال التعليق عبر نموذج أو API
            fetch('writeComment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTg3OTgyZWMxMDEyODQwZDRhNjQ1OWE0NjNhOTlhYjZhNWRhZDNkOWFkNTk4NzU3Yzg3NTI0OGEzYjg3YTQ5NzAyMTRiZjRjMGY5NzUyMzMiLCJpYXQiOjE3MjM4ODUwMjkuMTE2NzMxLCJuYmYiOjE3MjM4ODUwMjkuMTE2NzM2LCJleHAiOjE3NTU0MjEwMjguOTg1MDk5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.u4Cyn7dtJeM6nWnB51BcHzGYBJnGO-FF4mJDWtGmYZBPRHXSrc0xgkqz6y-8SBsNH0Z_u_-c3_9CM20nJdUMeBYvvyPJ6cqxvugCDtlwp0G1hvycTEsv-At7rybvGvbZ29d0-FwLKdBjkr3c7DXMfn7EiMnxSdU1U3aplnV1SP5yNrgOFfBBvMwb1O1h_B6kJhRqzpNDAKUd8zRquo74NBMa3ML4aHc-4IUmZjv0snaT7X3kJ92BvcfieyveNo9RVozFw_fQg7xMXElyANqzXHz6XvkR1EaVeNmv73E8kR2G5Oe4MJMrCTm2Dpzz6yc1DD-i5LrCW4U3KlgrKEFyxvZxxgUvfwsKGbWz6ydX0q6fJpBJl1ygsjbSLI7DL5ci7EChayL70yDXs7ey9IMo18mTLxYxj3R3oXCk0eU5mcMzn2UlZRhDZaFfhk_cofZil1K96aTNAr9wsPTlxfyvVt1TYakOUhlLjiKzGwD93_EKB3zeNGn_wvkxPCXeRhfLqoWfC4WElQoJETdHdmEtARtZRFdteSU-02zt6-HA2X6zF1dhuFKqY7c4t2M4TpJcq503YPsaQD4pHaHcZtxQaYyjhCz8O3YW4NoyPWhfwn1GWxj7AxUWH3pe6bXaTPGAs9thIS02WWqZxn8y8_M8e59hrQRL9wkxXw5ZrplJa58' // ضع توكن المصادقة الخاص بك هنا
                },
                body: JSON.stringify({
                    comment: commentText,
                    rate: 5, // يمكن تحديث هذه القيمة حسب الحاجة
                    hotel_id: 1 // ضع معرف الفندق المناسب هنا
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 200) {
                        commentInput.value = ''; // مسح حقل الإدخال بعد إرسال التعليق
                    } else {
                        console.error('Error:', data.message);
                    }
                });
        }
    }
</script>
</body>
</html>
