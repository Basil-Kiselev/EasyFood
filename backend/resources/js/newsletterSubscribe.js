document.addEventListener("DOMContentLoaded", function(event) {
    let subscribeBtn = document.getElementsByClassName('js-subscribe-btn');
    let subscribeForm = document.getElementsByClassName('js-subscribe-form');

    if (subscribeForm.length) {
        subscribeForm = subscribeForm[0];
        subscribeBtn = subscribeBtn[0];

        subscribeForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            let formData = new FormData(subscribeForm, subscribeBtn);
            let subscribeEmail = formData.get('subscribeEmail');

            if (validateEmail(subscribeEmail)) {
                let response = await fetch('/api/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        email: subscribeEmail,
                    })
                });

                let result = await response.json();
                if (result.message === true) {
                    alert('Вы подписаны');
                }
            }
        });
    }
});

function validateEmail(email) {
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        alert("Введите корректный email");
        return false;
    } else {
        return true;
    }
}
