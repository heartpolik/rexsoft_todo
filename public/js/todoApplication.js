/**
 * Created by polik on 01.12.16.
 */
// returns id of category, that stored in blade template
var getActiveCategory = function () {
    return $('#currentCategoryValue').val();
};
// store id of active category
var setActiveCategory = function (categoryId) {
    $('#currentCategoryValue').val(categoryId);
};
// change style of chosen category
var renderActiveCategory = function () {
    $('.category-list-item').removeClass('active');
    $('#category-item-' + getActiveCategory()).addClass('active');
};
// returns an html with list of categories
var renderCategories = function () {
    $.ajax({
        url: '/showCategories',
        success: function (response) {
            console.log('category list loaded!');
            document.getElementById('categoryListContainer').innerHTML = response;
            renderActiveCategory(getActiveCategory());
            renderCategoryOptionsList();
        }
    })
};
// retuns list of categories into dropdown menu at create task modal
var renderCategoryOptionsList = function () {
    $.ajax({
        url: '/showCategoryOptionsList',
        success: function (response) {
            console.log('category options loaded!');
            document.getElementById('categoriesOptionContainer').innerHTML = response;
        }
    });
};
// returns list of tasks by category
var renderTasks = function (categoryID) {
    $.ajax({
        url: '/showTasks',
        data: {
            categoryId: categoryID
        },
        success: function (response) {
            document.getElementById('taskListContainer').innerHTML = response;
        }
    });
};
// manipulation with checked status
var toggleTaskStatus = function (id) {
    console.log('task ' + id + ' wuz changed');
    $.ajax({
        type: 'PUT',
        url: '/toggleTaskStatus',
        data: {
            taskId: id
        },
        success: function () {
            renderTasks(getActiveCategory());
        }
    });
};
var deleteTask = function (id) {
    $.ajax({
        type: 'DELETE',
        url: '/deleteTask',
        data: {
            taskId: id
        },
        success: function () {
            renderTasks(getActiveCategory());
            renderCategories();
        }
    });
};
// query to edit or create task
var taskProcessing = function (method, actionUrl, data) {
    $.ajax({
        type: method,
        url: actionUrl,
        data: data,
        success: function () {
            renderCategories();
            renderTasks(getActiveCategory());
            // TODO: reset category name field
        }
    });
};

var createTask = function () {
    var numberOfCategories = $('#field').data("field-id");
    if (0 == numberOfCategories) {
        alert('There is no categories! Create, at least, one!');
        $('#create_category_modal').modal('show');
        return;
    }
    var action = '/createTask',
        method = 'POST',
        data = {
            name: $('#taskNameField').val(),
            category_id: $('#categoriesOptionContainer').val(),
            priority: $('#priorityField:checked').val()
        };
    taskProcessing(method, action, data);
    console.log('new task added');
};

var editTask = function (id) {
    var numberOfCategories = $('#field').data("field-id");
    if (0 == numberOfCategories) {
        alert('There is no categories! Create, at least, one!');
        $('#create_category_modal').modal('show');
        return;
    }
    $.ajax({
        url: '/editTask',
        data: {
            taskId: id
        },
        success: function (response) {
            document.getElementById('edit_task_modal').innerHTML = response;
            renderCategoryOptionsList();
            $('#edit_task_modal').modal('show');
        }
    });
};
var updateTask = function (id) {
    var method = 'PUT',
        action = '/updateTask',
        data = {
            taskId: id,
            name: $('#editTaskNameField').val(),
            category_id: $('#editCategoriesOptionContainer').val(),
            priority: $('#editTaskPriorityField:checked').val()
        };
    console.log(data);
    taskProcessing(method, action, data);
    console.log('task ' + id + ' wuz edited');
};

var showCategorizedTasks = function (id) {
    renderTasks(id);
    setActiveCategory(id);
    renderActiveCategory();
};

var createCategory = function () {
    $.ajax({
        type: 'POST',
        url: '/createCategory',
        data: {
            name: $('#categoryName').val()
        },
        successful: function () {
            console.log('new category added');
            // TODO: reset category name field
        }
    });
    renderCategories();
};

var deleteCategory = function (id) {
    $.ajax({
        type: 'DELETE',
        url: '/deleteCategory',
        data: {
            categoryId: id
        },
        success: function () {
            renderCategories();
            showCategorizedTasks(0);
        }
    })
};

// MAIN PROCESSING
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    setActiveCategory(0);
    renderCategories();
    showCategorizedTasks(getActiveCategory());
});
