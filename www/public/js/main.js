$(document).ready(function() {
    $('.claim-btn').click(function() {
       var rewardId = $(this).closest('.card-body').find('.rewardId').val();
       var csrfToken = $('meta[name="csrf-token"]').attr('content');
        if(confirm("Do you want to claim the reward") == true){
            $.ajax({
                url: '/claim-reward',
                type: 'POST',
                data: { rewardId: rewardId },
                headers: {'X-CSRF-TOKEN': csrfToken},
                success: function(response) {
                  // Handle success response here
                  if (response.success){
                    location.reload();
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  // Handle error response here
                }
              });
        }
    });

    $('.rm-btn').click(function() {
        var rewardId = $(this).closest('.card-body').find('.rewardId').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
         if(confirm("Do you want to remvoe the reward") == true){
             $.ajax({
                 url: '/remove',
                 type: 'POST',
                 data: { rewardId: rewardId },
                 headers: {'X-CSRF-TOKEN': csrfToken},
                 success: function(response) {
                   // Handle success response here
                   if (response.success){
                     location.reload();
                   }
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                   // Handle error response here
                 }
               });
         }
     });
  });