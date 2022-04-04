$(function () {
    $('#datatable').DataTable({
        "scrollX": true
    });
});

function approve(event) {
    let item = event.currentTarget.name;
    console.log(item);
    var obj = JSON.parse(item);
    $('#dormitoryId').val(obj.id);
    $('#room_name').text(obj.dormitory_room);
}

function deleteDom(event) {
    let item = event.currentTarget.name;
    console.log(item);
    var obj = JSON.parse(item);
    $('#deleteDormitoryId').val(obj.id);
    $('#roomNameDelete').text(obj.dormitory_room);
}

$(document).on(
    "click",
    "#approveBt,#deleteBt",
    (event) => {
        let id = event.currentTarget.id;

        switch (id) {
            case "approveBt":
                approve(event);
                break;
            case "deleteBt":
                deleteDom(event)
                break;
        }
    });