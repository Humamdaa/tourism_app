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
<ul id="comments-list"></ul>

<div id="comment-form">
    <input type="text" id="comment-input" placeholder="Enter your comment" />
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
    channel.bind('comment.sent', function(data) {
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
    window.onload = function() {
        fetch('InsideHotelPage')
            .then(response => response.json())
            .then(data => {
                data.data[1].comment.forEach(comment => {
                    addCommentToUI(comment);
                });
            })
            .catch(error => console.error('Error fetching comments:', error));
    };

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
                    'Authorization': 'Bearer YOUR_TOKEN' // ضع توكن المصادقة الخاص بك هنا
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
