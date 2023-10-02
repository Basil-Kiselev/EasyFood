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
                    let response = await fetch('/api/cart/coupon', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
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
                    let cartId = cart.dataset.cartId;
                    let response = await fetch('/api/cart', {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            article: productArticle,
                            cartId: cartId,
                        })
                    });
                    let result = await response.json();
                    if (result.message) {
                        alert(result.message);
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
                    quantValue = incBtn.parentNode
                    let cartId = cart.dataset.cartId;
                    let productArticle = quantValue.dataset.article;
                    let response = await fetch('/api/cart/change-quantity', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            article: productArticle,
                            cartId: cartId,
                            type: 'inc',
                        })
                    });
                    let result = await response.json();
                    if (result.message) {
                        alert(result.message);
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
                    quantValue = decBtn.parentNode
                    let cartId = cart.dataset.cartId;
                    let productArticle = quantValue.dataset.article;
                    let response = await fetch('/api/cart/change-quantity', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            article: productArticle,
                            cartId: cartId,
                            type: 'dec',
                        })
                    });
                    let result = await response.json();
                    if (result.message) {
                        alert(result.message);
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




