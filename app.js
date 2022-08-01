$(function () {
    newBtn = document.querySelector('.create')
    closeBtn = document.querySelector('.close')
    closeEdit = document.querySelector('.close-edit')
    save = document.querySelector('.save')
    modal = document.querySelector('.modal-todo')
    edit = document.querySelector('.edit-todo')
    mainTodo = document.querySelector('.todo-holder')

    title = document.querySelector('.title');
    author = document.querySelector('.name');
    body = document.querySelector('.text');

    // save after inputing your todo
    save.onclick = () => {
        modal.classList.remove('active2')
        setTimeout(() => {
            modal.classList.remove('active1')
            // calling the todo function
            if (title.value !== '' && author.value !== '' && body.value !== '') {
                addTodo(save)
            } else {
                alert('You Can Not Save An Empty Todo....!')
            }
        }, 1000)
    }


    // ADDING TODO BOXES AJAX
    function addTodo(btn) {
        const from = 'sage';
        const owner = btn.getAttribute('id');
        $.ajax({
            url: 'config/ajfunc.php',
            method: 'POST',
            data: {
                title: title.value,
                author: author.value,
                body: body.value,
                owner: owner,
                from: from
            },
            success: (data) => {
                if (data == 'INSERTED') {
                    // alert(data)
                    window.location.reload();
                } else {
                    // alert(data)
                }
            }
        })
    }


    // DELETING ADDED TODO BOXES
    $('.del').on('click', function (evt) {
        const id = $(this).attr('id');

        $.ajax({
            url: 'config/ajfunc.php',
            method: 'POST',
            data: {
                delete: id,
            },
            success: (data) => {
                if (data == 'DELETED') {
                    // alert(data)
                    window.location.reload();
                } else {
                    // alert(data);
                }
            }
        })
    })



    // EDIT POP UP
    $todos = $("div[class='todo']");

    $todos.each(function (id, el) {
        let todoTitle = el.querySelector('.todo-title h6').textContent;
        let todoAuthor = el.querySelector('.todo-name .author').textContent;
        let todoBody = el.querySelector('.todo-body .msg').textContent;
        let editBtn = el.querySelector('.edt');
        editBtn.addEventListener('click', function () {
            truth = confirm('SURE YOU WANT TO EDIT...?')
            if (truth) {
                edit.classList.add('active1')
                setTimeout(() => {
                    edit.classList.add('active2')
                    document.querySelector('.edit-title').value = todoTitle;
                    document.querySelector('.edit-name').value = todoAuthor;
                    document.querySelector('.edit-text').value = todoBody;
                }, 50)
            }
        })
    })


        // ADDING TODO BOXES AJAX
        $('.save-edit').on('click', function(){
            const from = 'sage-edit';
            $.ajax({
                url: 'config/ajfunc.php',
                method: 'POST',
                data: {
                    title: document.querySelector('.edit-title').value,
                    author: document.querySelector('.edit-name').value,
                    body: document.querySelector('.edit-text').value,
                    from: from
                },
                success: (data) => {
                    if (data == 'UPDATED') {
                        // alert(data)
                        window.location.reload();
                    } else {
                        // alert(data)
                    }
                }
            })
        })




    // adding new elements button action
    newBtn.onclick = () => {
        modal.classList.add('active1')
        setTimeout(() => {
            modal.classList.add('active2')
        }, 50)
    }


    // close new todo button action
    closeBtn.onclick = () => {
        modal.classList.remove('active2')
        setTimeout(() => {
            modal.classList.remove('active1')
        }, 150)
    }


    // CLOSE EDIT TODO BUTTON ACTION
    closeEdit.onclick = () => {
        edit.classList.remove('active2')
        setTimeout(() => {
            edit.classList.remove('active1')
        }, 150)
    }

})
