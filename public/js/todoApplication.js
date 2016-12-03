/**
 * Created by polik on 01.12.16.
 */
var getActiveCategory = function () {
    return $('#currentCategoryValue').val();
}
var setActiveCategory = function (categoryId) {
    $('#currentCategoryValue').val(categoryId);
}
var getCategoriesQuantity = function () {
    $.ajax({
        url : '/getCatQuantity',
        success : function (response) {

        }
    });
}
var renderActiveCategory = function () {
    $('.category-list-item').removeClass('active');
    $('#category-item-' + getActiveCategory()).addClass('active');
}
var renderCategories = function () {
    $.ajax({
        url : '/showCategories',
        success : function (response) {
            console.log('category list loaded!');
            document.getElementById('categoryListContainer').innerHTML = response;
            renderActiveCategory(getActiveCategory());
            renderCategoryOptionsList();
        }
    })
}
var renderCategoryOptionsList = function () {
    $.ajax({
        url : '/showCategoryOptionsList',
        success : function (response) {
            console.log('category options loaded!');
            document.getElementById('categoriesOptionContainer').innerHTML = response;
        }
    });
}
var renderTasks = function (categoryID) {
    $.ajax({
        url : '/showTasks',
        data : {
            categoryId : categoryID
        },
        success : function (response) {
            document.getElementById('taskListContainer').innerHTML = response;
        }
    })
}
var toggleTaskStatus = function(id){
    console.log('task ' + id + ' wuz changed');
    $.ajax({
        type : 'PUT',
        url : '/toggleTaskStatus',
        data : {
            taskId : id
        },
        success : function () {
            renderTasks(getActiveCategory());
        }
    });
}
var deleteTask = function (id) {
    $.ajax({
        type: 'DELETE',
        url : '/deleteTask',
        data : {
            taskId : id
        },
        success : function () {
            renderTasks(getActiveCategory());
            renderCategories();
        }
    })
}
var createTask = function () {
    console.log(document.getElementById('categoriesQuantity'));
    if (0 === $('#categoriesQuantity').val()) {
        alert ('There is no categories! Create, at least, one!');
    } else {
        $.ajax({
            type: 'POST',
            url: '/createTask',
            data: {
                name: $('#taskNameField').val(),
                category_id: $('#categoriesOptionContainer').val(),
                priority: $('#priorityField:checked').val(),
            },
            success: function () {
                renderCategories();
                renderTasks(getActiveCategory());
                console.log('new task added');
                // TODO: reset category name field
            }
        });
    };
}
var editTask = function (id) {
    console.log('task ' + id + ' wuz edited');
}
var showCategorizedTasks = function (id) {
    renderTasks(id);
    setActiveCategory(id);
    renderActiveCategory();
};
var createCategory = function () {
    console.log($('#categoryName').val());
    $.ajax({
        type : 'POST',
        url : '/createCategory',
        data : {
            name : $('#categoryName').val()
        },
        successful : function () {
            console.log('new category added');
            // TODO: reset category name field
        }
    })
    renderCategories();
}
var deleteCategory = function(id){
    $.ajax({
        type: 'DELETE',
        url : '/deleteCategory',
        data : {
            categoryId : id,
        },
        success : function () {
            renderCategories();
            showCategorizedTasks(0);
        }
    })
}

// MAIN PROCESSING
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(getCategoriesQuantity());
    setActiveCategory(0);
    renderCategories();
    showCategorizedTasks(getActiveCategory());


})
