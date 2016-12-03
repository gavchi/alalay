function historyJS(){
    // Prepare
    var History = window.History; // Note: We are using a capital H instead of a lower h
    if ( !History.enabled ) {
        // History.js is disabled for this browser.
        // This is because we can optionally choose to support HTML4 browsers or not.
        return false;
    }

    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function() { // Note: We are using statechange instead of popstate
        var State = History.getState();
        $('section.content').load(State.url);
        /* Instead of the line above, you could run the code below if the url returns the whole page instead of just the content (assuming it has a `#content`):
         $.get(State.url, function(response) {
         $('#content').html($(response).find('#content').html()); });
         */
    });


    // Capture all the links to push their url to the history stack and trigger the StateChange Event
    $('.sidebar__nav').on('click','a',function(evt) {
        evt.preventDefault();
        History.pushState(null, $(this).text(), $(this).attr('href'));
    });
}

$(function() {
    historyJS();
});