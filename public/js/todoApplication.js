/**
 * Created by polik on 01.12.16.
 */
var renderCategories = function () {
    $.ajax({
        url : '/showCategories',
        success : function (response) {
            console.log('category list loaded!');
            document.getElementById('categoryListContainer').innerHTML = response;
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
            console.log('tasks list by ' + categoryID + ' category loaded!');
        }
    })
}
var toggleTaskStatus = function(id){
    console.log('task ' + id + ' wuz changed');
    $.ajax({
        url : '/toggleTaskStatus',
        data : {
            taskId : id,
            categoryId : '*'
        },
        success : function () {
            renderTasks('*');
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
            renderTasks('*');
            renderCategories();
        }
    })
}
var editTask = function (id) {
    console.log('task ' + id + ' wuz edited');
}
var categoryProcessing = function (id) {
    console.log('click action works on ' + id + ' category');
    renderTasks(id);
};

// MAIN PROCESSING
$(document).ready(function () {
    renderCategories();
    renderTasks('*');


})
