//добавляем товар в корзину
function addToCart(itemId) {
    console.log('js-addToCart()')
    $.ajax({
        type: 'POST',
        async: true,
        url: '/cart/addtocart/' + itemId + '/',
        dataType: 'json',
        success: function (data){
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems'])

                $('#addCart_' + itemId).hide()
                $('#removeCart_' + itemId).show()
            }
        },

    })
}

// удаляем товар из корзины
function removeFromCart(itemId) {
    console.log("js-removeFromCart()")
    $.ajax({
        type: 'POST',
        async: true,
        url: '/cart/removefromcart/' + itemId + '/',
        dataType: 'json',
        success: function (data){
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems'])

                $('#addCart_' + itemId).show()
                $('#removeCart_' + itemId).hide()
            }
        },

    })
}

//подчет стоимости товара
//"@param integer itemId ID продукта
function conversionPrice(itemId) {

    let newCnt = $('#itemCnt_' + itemId).val()
    let itemPrice = $('#itemPrice_' + itemId).attr('value')
    let itemRealPrice = newCnt * itemPrice

    $('#itemRealPrice_' + itemId).html(itemRealPrice)
}

//получение данных с формы
function getData(obj_form){
    let hData = {}

    $('input, textarea, select', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value
            console.log('hData[' + this.name + '] = ' + hData[this.name])
        }
    })

    return hData
}


//регистрация нового пользователя
function registerNewUser() {
    let postData = getData('#registerBox')

    $.ajax({
        type: 'POST',
        async: true,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert('Вы зарегестрированы!!')

                //блок в левом столбце
                $('#registerBox').hide()

                $('#userLink').attr('href', '/user/')
                $('#userLink').html(data['userName'])
                $('#userBox').show()

                // //страница заказа
                $('#loginBox').hide()
                $('#btnSaveOrder').show()
                $("#btnSaveOrder").addClass('btn btn-success')
            }else {
                alert(data['message'])
            }
        },
    })
}

//Войти
function login() {
    let email = $('#loginEmail').val()
    let pwd = $('#loginPassword').val()

    let postData = "email="+ email+ "&pwd="+ pwd

    $.ajax({
        type: 'POST',
        async: true,
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {

                $("#registerBox").hide()
                $("#loginBox").hide()

                $("#userLink").attr('href', '/user/')
                $("#userLink").html(data['displayName'])
                $("#userBox").show()

                //запольныем поля на странице заказа
                $("#name").val(data['name'])
                $("#phone").val(data['phone'])
                $("#adress").val(data['adress'])

                $("#btnSaveOrder").show()
                $("#btnSaveOrder").addClass('btn btn-success')

            }else{
                alert(data['message'])
            }
        }
    })
}

//Toggle RegisterBox
 function showRegisterBox() {
    $('.registerBoxHidden').toggle()
 }

//Обновления данных пользователя
function updateUserData() {
    console.log('js-updateUserData()')

    let phone = $("#newPhone").val()
    let adress = $("#newAdress").val()
    let pwd1 = $("#newPwd1").val()
    let pwd2 = $("#newPwd2").val()
    let curPwd = $("#curPwd").val()
    let name = $("#newName").val()

    const postData = {
        phone: phone,
        adress: adress,
        pwd1: pwd1,
        pwd2: pwd2,
        curPwd: curPwd,
        name: name,
    }

    $.ajax({
        type: 'POST',
        async: true,
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#userLink').html(data['userName'])
                alert(data['message'])
            }else{
                alert(data['message'])
            }
        }
    })
}

//Сохраниение заказа
function saveOrder() {
    const postData = getData('form')
    $.ajax({
        type: 'POST',
        async: true,
        url: "/cart/saveorder/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert(data['message'])
                document.location = '/'
            }else{
                alert(data['message'])
            }
        }
    })
}

//Показывать , прятать данные о заказе
function showProducts(id) {
    let objName = "#purchaseForOrderId_" + id

    if ( $(objName).css('display') != 'table-row' ){
        $(objName).show()
    }else {
        $(objName).hide()
    }

}


//выход
//
// function logout (){
//     console.log('logout')
//
//     let link
//
//     link = $("#redirect").attr('href', '/')
//      location.href = link
// }

