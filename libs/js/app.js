$(function(){
    var E_project = $(".project");
    var E_project_expand = $(".project-expand");
    E_project.on("click", function(e){
        e.preventDefault();
        var that = $(this);
        var E_console_msg = that.parents(".thumbnail").find(".js-console-msg");
        var E_expand_btn = that.siblings(".project-expand");
        var V_project = that.data("project");
        var V_data = {project: V_project};


        E_console_msg.text(""); // clean cosole message
        that.attr({disabled: "disabled"}) // set button pendding status
        $.post('svn-update.php', V_data, {dataType: 'json'}).then(function(response){
            E_console_msg.removeClass("hide"); // show console msg
            E_expand_btn.removeClass("hide"); // show expand btn
            E_console_msg.JSONView(response,  { collapsed: true, nl2br: true, recursive_collapser: true });
        }, function(response){
        }).always(function(){
            that.removeAttr("disabled");
        })
    });

    E_project_expand.on("click", function(e){
        e.preventDefault();
        var that = $(this);
        var E_console_msg = that.parents(".thumbnail").find(".js-console-msg");
        E_console_msg.JSONView('toggle');
    })

    /*
       E_zombie.on("click", function(){
       var that = $(this);
       that.siblings('a').removeAttr("disabled");
       });
     */
});

