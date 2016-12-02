/**
 * Created by polik on 01.12.16.
 */
var getActiveCategory = function () {
    return $('#currentCategoryValue').val();
}
var setActiveCategory = function (categoryId) {
    $('#currentCategoryValue').val(categoryId);
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
        }
    })
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
        url : '/deleteTask',
        data : {
            taskId : id
        },
        success : function (response) {
            renderTasks(getActiveCategory());
            renderCategories();
        }
    })
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
        method : 'POST',
        url : '/createCategory',
        data : {
            name : $('#categoryName').val()
        },
        successful : function () {
            console.log('new category added');
            renderCategories();
        }
    })
}
var deleteCategory = function(id){
    $.ajax({
        url : '/deleteCategory',
        data : {
            categoryId : id
        },
        success : function () {
            renderCategories();
            showCategorizedTasks(0);
        }
    })
}

// MAIN PROCESSING
$(document).ready(function () {
    setActiveCategory(0);
    renderCategories();
    showCategorizedTasks(getActiveCategory());


})
