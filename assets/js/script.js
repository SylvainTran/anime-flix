$(document).ready(setup);

function setup() {
    $('.btn-register').on("click", toggleRegForm);
    $('.btn-danger').on("click", ()=> {
        $('#body--container__form-reg').hide();
    });
    $('.btn-list-form').on("click", listForm);
}

function toggleRegForm(event) {
    const ANIM_TIME = 300;
    $('#body--container__form-reg').toggle(ANIM_TIME);
}

/**
 *  listForm
 *  send form action 
 */
function listForm(event) {
    $('#list-form').submit();
}