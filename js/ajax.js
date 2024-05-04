$(document).on('click', '.update', function (e) {
    var id = $(this).attr("data-id");
    $('#id_u').val(id);
});


//Product Edit (Admin)
$(document).on('click', '.update1', function (e) {
    var pd_id = $(this).attr("data-id");
    var pd_name = $(this).attr("data-name");
    var drug_name = $(this).attr("data-drug");
    var company = $(this).attr("data-company");
    var cat_id = $(this).attr("data-cat");
    var pkg = $(this).attr("data-pkg");
    $('#pd_id').val(pd_id);
    $('#pd_name').val(pd_name);
    $('#drug_name').val(drug_name);
    $('#company').val(company);
    $('#cat_id').val(cat_id);
    $('#pkg').val(pkg);
});
$(document).on('click', '#update1', function (e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../admin/product_list.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#updateModal').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});


// Product Delete (Admin)
$('.delete').click(function () {
    var id = $(this).attr('data-id');
    $('#id').val(id);
});
$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "../admin/product_list.php",
        type: "POST",
        cache: false,
        data:{
            del_id: $("#id").val()
        },
        success: function(dataResult){
                $('#deleteModal').modal('hide');
                $("#"+dataResult).remove();
        
        }
    });
});


// Announcement Edit (Admin)
$(document).on('click', '.update2', function (e) {
    var an_id = $(this).attr("data-id");
    var an_title = $(this).attr("data-name");
    var description = $(this).attr("data-des");

    $('#an_id').val(an_id);
    $('#an_title').val(an_title);
    $('#description').val(description);
});
$(document).on('click', '#update2', function (e) {
    var data = $("#update_form2").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../admin/announcement.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#updateModal2').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});


// Request Product edit (User)
$(document).on('click', '.update3', function (e) {
    var req_id = $(this).attr("data-id");
    var req_name = $(this).attr("data-name");
    var req_drug = $(this).attr("data-drug");
    var req_company = $(this).attr("data-company");
    var req_pack = $(this).attr("data-cat");
    var req_category = $(this).attr("data-pkg");
    var req_mrp = $(this).attr("data-mrp");
    $('#req_id').val(req_id);
    $('#req_name').val(req_name);
    $('#req_drug').val(req_drug);
    $('#req_company').val(req_company);
    $('#req_pack').val(req_pack);
    $('#req_category').val(req_category);
    $('#req_mrp').val(req_mrp);
});
$(document).on('click', '#update3', function (e) {
    var data = $("#update_form3").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../user/request_medicine.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#updateModal3').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});


//Order Store (Request)
$(document).on('click', '.order', function (e) {
    var stock_id = $(this).attr("data-s_id");
    var pd_name = $(this).attr("data-name");
    var pd_id = $(this).attr("data-pd_id");
    var md_id = $(this).attr("data-md_id");
    var quantity = $(this).attr("data-qty");
    var company = $(this).attr("data-cmp");
    var cat_name = $(this).attr("data-cat");
    var pkg = $(this).attr("data-pkg");
    var exp_date = $(this).attr("data-exp");
    var price = $(this).attr("data-price");
    var drug_name = $(this).attr("data-drug");
    var md_area = $(this).attr("data-area");
    var ptr = $(this).attr("data-ptr");
    var mrp = $(this).attr("data-mrp");
    $('#stock_id').val(stock_id);
    $('#pd_name').val(pd_name);
    $('#pd_id').val(pd_id);
    $('#md_id').val(md_id);
    $('#quantity').val(quantity);
    $('#company').val(company);
    $('#cat_name').val(cat_name);
    $('#pkg').val(pkg);
    $('#exp_date').val(exp_date);
    $('#price').val(price);
    $('#drug_name').val(drug_name);
    $('#md_area').val(md_area);
    $('#ptr').val(ptr);
    $('#mrp').val(mrp);
});


//Image View
$(document).on('click', '.img', function (e) {
    var md_id = $(this).attr("data-id");
    var bank_cheque = $(this).attr("data-id");
    $('#md_id').val(md_id);
    $('#bank_cheque').val(bank_cheque);
});


//Category Edit (Admin)
$(document).on('click', '.update5', function (e) {
    var cat_id = $(this).attr("data-id");
    var cat_name = $(this).attr("data-name");

    $('#cat_id').val(cat_id);
    $('#cat_name').val(cat_name);

});
$(document).on('click', '#update5', function (e) {
    var data = $("#update_form5").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../admin/cat_dash.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#updateModal5').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            }
            else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});


//Delete Announcement (Admin)
$('.delete1').click(function () {
    var id = $(this).attr('data-id');
    $('#id').val(id);
});
$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "../admin/announcement.php",
        type: "POST",
        cache: false,
        data:{
            del_id: $("#id").val()
        },
        success: function(dataResult){
                $('#deleteModal').modal('hide');
                $("#"+dataResult).remove();
        
        }
    });
});


//Delete Requested Medicine (User)
$('.delete2').click(function () {
    var id = $(this).attr('data-id');
    $('#id').val(id);
});
$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "../admin/request_medicine.php",
        type: "POST",
        cache: false,
        data:{
            del_id: $("#id").val()
        },
        success: function(dataResult){
                $('#deleteModal').modal('hide');
                $("#"+dataResult).remove();
        
        }
    });
});