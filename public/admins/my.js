$(document).ready(function() {})

//Проверка при удалении новости!
$('.delete').on('click',function(){
    var res = confirm('Подтвердите действие');
    if(!res) return false;
})

//Загрузка картинок на сервер.
if ($('div').is('#single')) {
    var buttonSingle = $("#single"),
        file;
}

if (buttonSingle) {
    new AjaxUpload(buttonSingle, {
        action: adminpath + buttonSingle.data('url') + "?upload=1",
        data: { name: buttonSingle.data('name') },
        name: buttonSingle.data('name'),
        onSubmit: function(file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonSingle.closest('.file-upload').find('.overlay').css({ 'display': 'block' });

        },
        onComplete: function(file, response) {
            setTimeout(function() {
                buttonSingle.closest('.file-upload').find('.overlay').css({ 'display': 'none' });

                response = JSON.parse(response);
                $('.' + buttonSingle.data('name')).html('<img src="/image/' + response.file + '" style="max-height: 150px;">');
            }, 1000);
        }
    });
}

//Удаление картинок галлереи
$('.del-item').on('click', function() {
    var res = confirm('Подтвердите действие');
    if (!res) return false;
    var $this = $(this),
        id = $this.data('id'),
        src = $this.data('src');
    $.ajax({
        url: adminpath + '/news/delete-gallery',
        data: { id: id, src: src },
        type: 'POST',
        beforeSend: function() {
            $this.closest('.file-upload').find('.overlay').css({ 'display': 'block' });
        },
        success: function(res) {
            setTimeout(function() {
                $this.closest('.file-upload').find('.overlay').css({ 'display': 'none' });
                if (res == 1) {
                    $this.fadeOut();
                }
            }, 1000);
        },
        error: function() {
            setTimeout(function() {
                $this.closest('.file-upload').find('.overlay').css({ 'display': 'none' });
                alert('Ошибка');
            }, 1000);
        }
    });
});

$('#add').on('submit', function() {
    if (!isNumeric($('#category_id').val())) {
        alert('Выберите категорию');
        return false;
    }
});
