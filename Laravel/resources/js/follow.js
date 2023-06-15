
function follow(userId) {
  $.ajax({

    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: `/follow/${userId}`,
    type: "POST",
  })
    .done((data) => {
      console.log(data);
    })
    .fail((data) => {
      console.log(data);
    });
}

function unFollow(userId) {
  $.ajax({

    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: `/follow/${userId}/destroy`,
    type: "POST",
  })
    .done((data) => {
      console.log(data);
    })
    .fail((data) => {
      console.log(data);
    });
}
