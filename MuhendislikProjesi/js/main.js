$(function(){
    var editID = 0; // Düzenleme yaparken kimi düzenlediğimizi seçiyoz 0 sa ekleme 0 değilse neyi düzenliyorsak onun idsi

    add = function(name,no,adres){  // ekleme fonksiyonu
        $.ajax({
            url: 'server/index.php', // Server adresi
            type: 'POST', // Parametrelerin tipi
            data:{type:'add',name:name,adres:adres,no:no}, // Servere gönderilen parametreler
            dataType: 'JSON', // Dönüş tipi
            success: function(ret){
                if(ret.result){ // Dönen json da result true ise
                    clear(); // inputları temizliyor
                    list(); // tabloyu dolduran fonksiyon
                }else alert(ret.error); // True değilse hata var demek onu basıyor
            }
        });
    }

    update = function(name,no,adres,id){ // Düzenleme yaparken kaydetme
        $.ajax({
            url: 'server/index.php',
            type: 'POST',
            data:{type:'update',name:name,adres:adres,no:no,id:id},
            dataType: 'JSON',
            success: function(ret){
                if(ret.result){
                    clear();
                    list();
                }else alert(ret.error);
            }
        });
    }

    get = function(id){ // Düzenlenecek satırı üstteki forma taşır
         $.ajax({
            url: 'server/index.php',
            type: 'POST',
            data:{type:'get',id:id},
            dataType: 'JSON',
            success: function(ret){
                if(ret.result){
                    editID = ret.get.id;
                    $("input[name=bilgilerim_adsoyad]").val(ret.get.ad);
                    $("textarea[name=bilgilerim_adres]").val(ret.get.adres);
                    $("input[name=bilgilerim_no]").val(ret.get.numara);

                }else alert(ret.error);
            }
        });
    }


    del = function(id){ // Satırı siler
         $.ajax({
            url: 'server/index.php',
            type: 'POST',
            data:{type:'delete',id:id},
            dataType: 'JSON',
            success: function(ret){
                if(ret.result){
                    list();
                }else alert(ret.error);
            }
        });
    }

    

    clear = function(){ // Formu temizler
        editID = 0;
        $("input[name=bilgilerim_adsoyad]").val("");
        $("textarea[name=bilgilerim_adres]").val("");
        $("input[name=bilgilerim_no]").val("");
    }
    
    list = function(){ // Tabloyu doldurur
        $("#kayitlar tbody").html("");
        $.ajax({
            url:'server/index.php',
            type:'POST',
            data:{type:'list'},
            dataType:'JSON',
            success: function(ret){
                if(ret.result){
                    for (var i= 0; i < ret.list.length; i++){
                        $("#kayitlar tbody").append("<tr>"+
                  "<td scope=\"row\"></td>"+
                  "<td>"+ret.list[i].ad+"</td>"+
                  "<td>"+ret.list[i].numara+"</td>"+
                  "<td>"+ret.list[i].adres+"</td>"+
                  "<td aling='center'><button class=\"btn btn-secondary sil\" data-id='"+ret.list[i].id+"' style=\"width: 50px\">Sil</button></td>"+
                  "<td aling='center'><button class=\"btn btn-secondary duzenle\" data-id='"+ret.list[i].id+"' style=\"width: 80px\">Düzenle</button></td>"+
                "</tr>");
                    }
                }else alert(ret.error);
            }
        });
    }

    $("button[name=insertislemi]").on("click",function(e){ // Formdaki butona basarsa edit id ye göre işlem yapar
        // inputlardan verileri toplayıp id 0 sa eklemeye yoksa düzenlemeye gönderir
        var name = $("input[name=bilgilerim_adsoyad]").val();
        var no = $("input[name=bilgilerim_no]").val();
        var adres = $("textarea[name=bilgilerim_adres]").val();

        if(editID == 0)
            add(name,no,adres);
        else update(name,no,adres,editID);

        e.preventDefault();
    });

    $("#kayitlar").on("click",".sil",function(){ // Sil butonuna basınca ilgili id yi silme fonksiyonuna yollar
        var id = $(this).data("id") ;
        del(id);
    });

    $("#kayitlar").on("click",".duzenle",function(){ // Düzenle butonuna basınca verileri çekecek fonksiyona yollar
        var id = $(this).data("id") ;
        get(id);
    });

    list(); // İlk açılınca tabloyu doldurur

});