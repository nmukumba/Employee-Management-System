$("select[name='company_id']").change(function(){
      var company_id = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "/contract/branches/" + company_id,
          method: 'GET',
          success: function(data) {
            $("select[name='branch_id'").html('');
            $("select[name='branch_id'").html(data.options);
          }
      });
  });