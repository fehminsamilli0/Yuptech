onload = function(){
    Alrt();
}
function GetURL(x) {
    let url_string = location.href;
    let url = new URL(url_string);
    let c = url.searchParams.get(x);
    return c;
}


function Status(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "service-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function StatusCat(id){
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "service-cat",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function employeestatus(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "emp-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {
            if(data=="ok"){
                console.log('ok');
            } else{
                console.log('no');
            }
        },
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function jobstatus(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "job-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {
            if(data=="ok"){
                console.log('ok');
            } else{
                console.log('no');
            }
        },
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function PortStatus(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "port-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function TeamStatus(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "team-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function SliderStatus(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "slider-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}
function ThoughtsStatus(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "thoughts-status",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}



function PortfolioCat(id){
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "portfolio-cat",
        data: { _token: CSRF_TOKEN, id: id},
        method: "POST",
        success: function (data) {},
        error: function (x, sts) {
            console.log("Error...");
        },
    });
}



function DeleteEmp(id,logo) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "delete-emp",
                    data: { _token: CSRF_TOKEN, id:id, logo:logo},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteService(id,logo) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "info",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "delete-service",
                    data: { _token: CSRF_TOKEN, id:id, logo:logo},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteJob(id,icon) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "job-delete",
                    data: { _token: CSRF_TOKEN, id:id, icon:icon},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteCat(id) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "delete-cat",
                    data: { _token: CSRF_TOKEN, id:id},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeletePort(id,image) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "delete-port",
                    data: { _token: CSRF_TOKEN, id:id,image:image},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeletePortCat(id) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "delete-portcat",
                    data: { _token: CSRF_TOKEN, id:id},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteTeam(id,image) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "team-delete",
                    data: { _token: CSRF_TOKEN, id:id, image:image},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteSubs(id) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "subs-delete",
                    data: { _token: CSRF_TOKEN, id:id},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteThoughts(id,img) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "thoughts-delete",
                    data: { _token: CSRF_TOKEN, id:id, img:img},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}
function DeleteSlider(id,image) {
    swal({
        title: "Xəbərdarlıq",
        text: "İnformasiyanın silinməsindən əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Xeyr", "Bəli"],
    })
        .then((willDelete) => {
            if (willDelete) {
                let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "delete-slider",
                    data: { _token: CSRF_TOKEN, id:id, image:image},
                    method: "POST",
                    success: function (data) {
                        console.log(data);
                        if(data=="ok"){
                            location.reload();
                            console.log('ok');
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("İmtina edildi!");
            }
        });
}







function Alrt(){
    if(GetURL("status")=="ok"){
        swal("Uğurlu!", "Əməliyyat icra edildi!", "success");
        setTimeout(Redirect,1500);
    }
    if(GetURL("status")=="no"){
        swal("Uğursuz!", "Əməliyyat icra edilmədi!", "error");
        setTimeout(Redirect,1500);
    }

}

function Redirect(){
    location.href = location.protocol + '//' + location.host + location.pathname;
}




