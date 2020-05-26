//Date picker
$('#dob').datepicker({
	format: 'dd-mm-yyyy',
    autoclose: true
});

$('#start_date').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});

$('#end_date').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});

$('#date_issued').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});

$('#date_returned').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});

$('#closing_date').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
});

$('.textarea').wysihtml5();

$('#myTabs a[href="#contact-details"]').each(function(e) {
    var $this = $(this);
    // console.log('contact');
    // console.log(urlParam('id'));
    // $.ajax({
    //     url: "/contact_details/" + urlParam('id'),
    //     type: 'GET',
    //     success: function(res) {
    //         console.log(res.data);
    //         //alert(res);
    //     },
    //     error: function (res) {
    //         //console.log(res.data);
    //     }
    // });
    $this.tab('show');
    return false;
});

$('#myTabs a[href="#qualifications"]').click(function(e) {
    var $this = $(this);
    console.log('qualifications');
    console.log(urlParam('id'));
    $this.tab('show');
    return false;
});

$('#myTabs a[href="#documents"]').click(function(e) {
    var $this = $(this);
    console.log('qualifications');
    $this.tab('show');
    return false;
});

$('#myTabs a[href="#contracts"]').click(function(e) {
    var $this = $(this);
    console.log('qualifications');
    $this.tab('show');
    return false;
});

$('#myTabs a[href="#leave"]').click(function(e) {
    var $this = $(this);
    console.log('qualifications');
    $this.tab('show');
    return false;
});

$('#myTabs a[href="#warnings"]').click(function(e) {
    var $this = $(this);
    console.log('qualifications');
    $this.tab('show');
    return false;
});

$('#myTabs a[href="#work-tools"]').click(function(e) {
    var $this = $(this);
    console.log('qualifications');
    $this.tab('show');
    return false;
});

function urlParam (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)')
    .exec(window.location.search);

    return (results !== null) ? results[1] || 0 : false;
}

function deleteCompany(id)
{
   var id = id;
   var url = '/company/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteBranch(id)
{
   var id = id;
   var url = '/branch/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteDepartment(id)
{
   var id = id;
   var url = '/department/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteRole(id)
{
   var id = id;
   var url = '/role/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteDocumentType(id)
{
   var id = id;
   var url = '/document/type/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteQualificationType(id)
{
   var id = id;
   var url = '/qualification/type/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteUserType(id)
{
   var id = id;
   var url = '/user/type/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function deleteLeaveType(id)
{
   var id = id;
   var url = '/leave/type/delete/' + id;
   //url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
}

function formSubmit()
{
    //console.log('formSubmit');
   $("#deleteForm").submit();
}

function viewContract(url){
  $("#dialog").dialog();
  $("#frame").attr("src", "/storage/" + url);
}