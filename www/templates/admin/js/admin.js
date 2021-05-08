//получение данных с формы

function getData(obj_form) {
    let hData = {}
    $('input, textarea, select', obj_form).each(function () {
        if (this.name && this.name != '') {
            hData[this.name] = this.value
            console.log('hData[' + this.name + '] = ' + hData[this.name])
        }
    })
    return hData
}

//добавление новой категории
function newCategory() {
    let postData = getData('#blockNewCategory')

    $.ajax({
        type: 'POST',
        async: true,
        url: "/admin/addnewcat/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']){
                alert(data['message'])
                $('#newCategoryName').val('')
            }else{
                alert(data['message'])
            }
        }
    })
}

//обновление данных категории
function updateCat(itemId) {

    let parentId = $("#parentId_" + itemId).val()
    let newName = $("#itemName_" + itemId).val()
    let postData = {itemId: itemId, parentId: parentId, newName: newName}

    $.ajax({
        type:'POST',
        async: true,
        url: "/admin/updatecategory/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            alert(data['message'])
        }
    })
}

//добавление нового продукта
function addProduct() {

    let itemName = $('#newItemName').val()
    let itemPrice = $('#newItemPrice').val()
    let itemCatId = $('#newItemCatId').val()
    let itemDesc = $('#newItemDesc').val()

    const postdata = {itemName: itemName, itemPrice: itemPrice,
                        itemCatId: itemCatId, itemDesc: itemDesc}

    $.ajax({
        type: 'POST',
        async: true,
        url: "/admin/addproduct/",
        data: postdata,
        dataType: 'json',
        success: function(data) {
            alert(data['message'])

            if (data['success']) {
                $('#newItemName').val('')
                $('#newItemPrice').val('')
                $('#newItemCatId').val('')
                $('#newItemDesc').val('')
            }
        }
    })
}


//изменения данных продукта
function updateProduct(itemId) {

    let itemName = $("#itemName_" + itemId).val()
    let itemPrice = $("#itemPrice_" + itemId).val()
    let itemCatId = $("#itemCatId_" + itemId).val()
    let itemDesc = $("#itemDesc_" + itemId).val()
    let itemStatus = $("#itemStatus_" + itemId).attr('checked')

    if (!itemStatus) {
        itemStatus = 1
    }else{
        itemStatus = 0
    }

    const posData = {
        itemId: itemId,
        itemName: itemName,
        itemPrice: itemPrice,
        itemCatId: itemCatId,
        itemDesc: itemDesc,
        itemStatus: itemStatus,
    }

    $.ajax({
        type: 'POST',
        async: true,
        url: "/admin/updateproduct/",
        data: posData,
        dataType: 'json',
        success: function(data) {
            alert(data['message'])
        }
    })
}

//показать , скрыть табличку
function showAdminProducts(id) {
    let objOrder = "#purchaseForOrderId_" + id

    if ( $(objOrder).css('display') != 'table-row' ){
        $(objOrder).show()
    }else{
        $(objOrder).hide()
    }

}

function updateOrderStatus(itemId) {
    let status = $('#itemStatus_' + itemId).attr('checked')
    if (!status) {
        status = 0
    }else{
        status = 1
    }

    const postData = {itemId: itemId, status: status}

    $.ajax({
        type: 'POST',
        async: true,
        url: "/admin/setorderstatus/",
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (!data['success']) {
                alert(data['message'])
            }
        }
    })
}

function updateDatePayment(itemId) {
    let datePayment = $('#datePayment_' + itemId).val()
    const postData = {itemId: itemId, datePayment: datePayment}

    $.ajax({
        type: 'POST',
        async: true,
        url: '/admin/setorderdatepayment/',
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (!data['success']) {
                alert(data['message'])
            }
        }
    })

}

function createXML() {
    $.ajax({
        type: 'POST',
        async: true,
        url: "/admin/createxml/",
        dataType: 'html',
        success: function (data) {
            $("#xml_place").html(data)
            window.open('http://www.myshop.local/xml/products.xml', '_blank')
        }
    })
}

