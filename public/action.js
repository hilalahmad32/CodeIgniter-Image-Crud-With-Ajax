$(document).ready(function() {

    // get data
    const getData=()=>{  
        $.ajax({  
            url:'/get',
            type:'GET',
            success:(data)=>{  
                $("#get-data").html(data);
            }
        })
    }
    getData();
    // insert data
    $("#save").on('submit',function(e){  
        e.preventDefault();
        const title=$("#title").val();
        const image=$("#image").val();

        const formdata=new FormData(this);

        if(title == "" || image == "" ){  
            alert("Please Fill the Field");
        }else{  
            $.ajax({ 
                url:"/create",
                type:"POST",
                data:formdata,
                processData:false,
                contentType:false,
                success:(data)=>{
                    if(data == 1){  
                        alert("data insert successfully");
                        $("#save").trigger("reset");
                        $("#myModal").modal('hide');
                        getData();
                    }else{  
                        alert("not add successfully");
                    }
                }
            })
        }
    });

    $(document).on('click','#edit-product',function(){
        const id=$(this).data('id');
        $.ajax({  
            url:'/edit',
            type:'POST',
            data:{id:id},
            success:(data)=>{  
                $("#get-product-form").html(data);
            }
        })
    })


    $("#update").on('submit',function(e){  
        e.preventDefault();
        const title=$("#edit_title").val();

        const formdata=new FormData(this);

        if(title == "" ){  
            alert("Please Fill the Field");
        }else{  
            $.ajax({ 
                url:"/update",
                type:"POST",
                data:formdata,
                processData:false,
                contentType:false,
                success:(data)=>{
                    if(data == 1){  
                        alert("data Update successfully");
                        $("#update").trigger("reset");
                        $("#update-product").modal('hide');
                        getData();
                    }else{  
                        alert("not Update successfully");
                    }
                }
            })
        }
    });



    $(document).on('click','#delete-product',function(){
        const id=$(this).data('id');
        $.ajax({  
            url:'/delete',
            type:'POST',
            data:{id:id},
            success:(data)=>{  
                if(data == 1){  
                    alert('delete successfully');
                    getData(); 
                }else{  
                    alert('not delete successfully');
                }
            }
        })
    })
})