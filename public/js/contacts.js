document.addEventListener("DOMContentLoaded", function (event) {
    let feedbackForm = document.getElementsByClassName('js-feedback-message');
    let feedbackBtn = document.getElementsByClassName('js-feedback-btn');

    if (feedbackForm.length) {
        feedbackForm = feedbackForm[0];
        feedbackBtn = feedbackBtn[0];

        feedbackForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            let formData = new FormData(feedbackForm, feedbackBtn);
            let response = await fetch('/api/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify({
                    name: formData.get('name'),
                    email: formData.get('email'),
                    text: formData.get('text'),
                })
            });
            let result = await response.json();

            if (result.message) {
                alert(result.message);
            }
        });
    }
});

