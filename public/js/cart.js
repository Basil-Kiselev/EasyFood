document.addEventListener('DOMContentLoaded', async function (event) {
    let couponForm = document.getElementsByClassName('js-coupon-form');
    let couponBtn = document.getElementsByClassName('js-coupon-btn');
    let cart = document.getElementsByClassName('js-shoping-cart');
    let deleteIcons = document.getElementsByClassName('js-delete-cart-item');
    let incBtns = document.getElementsByClassName('js-cart-product-quant-inc');
    let decBtns = document.getElementsByClassName('js-cart-product-quant-dec');

    if (cart.length) {
        cart = cart[0];

// Применение купона
        if (couponForm.length) {
            couponForm = couponForm[0];
            couponBtn = couponBtn[0];
            couponForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                let formData = new FormData(couponForm, couponBtn);
                let promoCode = formData.get('promoCode');

                if (validatePromoCode(promoCode)) {
                    let response = await fetch('/ajax/cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({
                            promoCode: promoCode,
                        })
                    });
                    let result = await response.json();

                    if (result.message) {
                        alert(result.message);
                    }

                    location.reload()
                }
            });
        }
// Удаление товара из корзины
        if (deleteIcons.length) {
            for (let deleteIcon of deleteIcons) {
                deleteIcon.addEventListener('click', async function (event) {
                    event.preventDefault();
                    let productArticle = deleteIcon.dataset.productArticle;
                    let response = await fetch('/ajax/cart', {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({
                            article: productArticle,
                        })
                    });
                    let result = await response.json();

                    if (result.result === true) {
                        alert('Товар удален');
                    } else if (result.result === null) {
                        alert('Корзина пуста')
                    }

                    location.reload()
                });
            }
        }
// Увеличение кол-ва товаров в корзине
        if (incBtns.length) {
            for (let incBtn of incBtns) {
                incBtn.addEventListener('click', async function (event) {
                    event.preventDefault();
                    let quantValue = incBtn.parentNode
                    let productArticle = quantValue.dataset.article;
                    let response = await fetch('/ajax/cart/change-quantity', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({
                            article: productArticle,
                            type: 'inc',
                        })
                    });
                    let result = await response.json();

                    if (result.result === true) {
                        alert('Кол-во изменено');
                    }

                    location.reload()
                });
            }
        }
// Уменьшение кол-ва товаров в корзине
        if (decBtns.length) {
            for (let decBtn of decBtns) {
                decBtn.addEventListener('click', async function (event) {
                    event.preventDefault();
                    let quantValue = decBtn.parentNode
                    let productArticle = quantValue.dataset.article;
                    let response = await fetch('/ajax/cart/change-quantity', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({
                            article: productArticle,
                            type: 'dec',
                        })
                    });
                    let result = await response.json();

                    if (result.result === true) {
                        alert('Кол-во изменено');
                    }

                    location.reload();
                });
            }
        }
    }
});

function validatePromoCode(promoCode) {
    return typeof (promoCode) == 'string';
}




