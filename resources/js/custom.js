let axios = require('axios');

$('body').on('click', '.delete-bookmark', function(){
  let id = $(this).data('id');

  axios.delete('/marxmanager/public/bookmarks/'+id)
    .then(function(){
      window.location.reload();
    })
    .catch(function(error){
      console.log(error);
    })
});
