function edit2(event) {
    let item = event.currentTarget.name;
    console.log(item);
    var obj = JSON.parse(item);
    $('#editName').val(obj.dormitory_room);
    $('#editPrice').val(obj.price);
    $('#editAddress').val(obj.address);
    $('#editDess').val(obj.desscription);
    $('#contact').val(obj.contact);
    $('#other').text(obj.other);
    $('#map').text(obj.map);

}

$(document).on(
    "click",
    "#edit2Bt",
    (event) => {
        let id = event.currentTarget.id;
        // console.log(id);
        switch (id) {
            case "edit2Bt":
                edit2(event);
                break;
        }
    });