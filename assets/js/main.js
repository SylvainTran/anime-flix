$(document).ready(setup);

function setup() {
    $('#button main__button--display-weather').on("click", ()=> {
        $('#city-select-form').submit();
    });
}