function grad()
{
  $('#grad').empty();
  $('#grad').append("<option>Loading....</option>");
  $('#course').append("<option value='0'>--Select programme--</option>");
  $.ajax({
    type:"POST",
    url:"programme.php",
    contentType:"application/json; charset=utf-8",
    dataType:"json",
    success:function(data)
    {
      $('#grad').empty();
      $('#grad').append("<option value='0'>--Select Graduate--</option>");
      $.each(data,function(i,item)
      {
        $('#grad').append('<option value="'+data[i].programme +'">'+data[i].programme+'</option>');
      });
    },
    complete:function()
    {

    }
  });

}

function course(sid)
{
    $('#course').empty();
        $('#course').append("<option>Loading....</option>");
        $.ajax({
          type:"POST",
          url:"course.php?sid="+sid,
          contentType:"application/json; charset=utf-8",
          dataType:"json",
          success:function(data)
          {
            $('#course').empty();
            $('#course').append("<option value='0'>--Select Course--</option>");
            $.each(data,function(i,item)
            {
              $('#course').append('<option value="'+data[i].course +'">'+data[i].course+'</option>');
            });
          },
          complete:function()
          {

          }
        });
}
