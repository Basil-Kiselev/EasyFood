document.addEventListener("DOMContentLoaded", function (event) {
   let checkoutBtn = document.getElementsByClassName('js-checkout-btn');
   let checkoutForm = document.getElementsByClassName('js-checkout-form');
   let checkout = document.getElementsByClassName('js-checkout');
   let tagCoupon = document.getElementsByClassName('js-tag-coupon');

   if (checkout.length) {
       checkout = checkout[0];

       // Создание заказа
       /*if (checkoutForm.length) {
           checkoutForm = checkoutForm[0];
           checkoutBtn = checkoutBtn[0];

           checkoutForm.addEventListener('submit', async function (event) {
               event.preventDefault();

               let formData = new FormData(checkoutForm, checkoutBtn);
               let createAcc = 0;

               if (formData.get('create_acc') !== null) {
                   createAcc = 1;
               }

               let dataArray = {
                   "name": formData.get('name'),
                   "phone": formData.get('phone'),
                   "street": formData.get('street'),
                   "building": formData.get('building'),
                   "apartment": formData.get('apartment'),
                   "orderNotes": formData.get('order_notes'),
                   "createAcc": createAcc,
                   "email": formData.get('email'),
                   "password": formData.get('password'),
               };
               let response = await fetch('/ajax/checkout', {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json;charset=utf-8'
                   },
                   body: JSON.stringify({
                       name: dataArray['name'],
                       phone: dataArray['phone'],
                       street: dataArray['street'],
                       building: dataArray['building'],
                       apartment: dataArray['apartment'],
                       orderNotes: dataArray['orderNotes'],
                       createAcc: dataArray['createAcc'],
                       email: dataArray['email'],
                       password: dataArray['password'],
                   })
               });
               let result = await response.json();

               if (result.message) {
                   alert(result.message);
               }

               if (response.ok) {
                   window.location.href = '/';
               }
           });
       }*/

// Применение купона
       if (tagCoupon.length) {
           tagCoupon = tagCoupon[0];

           tagCoupon.addEventListener('click', async function (event) {
               event.preventDefault();

               let promoCode = prompt('Введите ваш промокод');

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
           })
       }
   }

});

function validatePromoCode(promoCode) {
    return typeof (promoCode) == 'string';
}


