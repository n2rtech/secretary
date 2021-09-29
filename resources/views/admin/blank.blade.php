<!DOCTYPE html> 

<html> 

<head> 

    <meta charset="utf-8"> 

    <meta name="viewport" content="width=device-width"> 

    <title>fullcalendar get current view date</title> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.css" /> 

</head> 

<style type="text/css"> 

    #calendar { 

        width:80%; 

        margin: 20px auto; 

    } 

</style> 

<body> 

    <div id="calendar"></div> 

</body> 

<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment-with-locales.min.js"></script> 

<script src="https://code.jquery.com/jquery-2.1.4.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js"></script> 

<script type="text/javascript"> 

    var defaultEvents = [ 

    { 

        // Just an event 

        title: 'Long Event', 

        start: '2017-02-07', 

        end: '2017-02-10', 

        className: 'scheduler_basic_event' 

    }, 

    { 

        // Custom repeating event 

        id: 999, 

        title: 'Repeating Event', 

        start: '2017-02-09T16:00:00', 

        className: 'scheduler_basic_event' 

    }, 

    { 

        // Custom repeating event 

        id: 999, 

        title: 'Repeating Event', 

        start: '2017-02-16T16:00:00', 

        className: 'scheduler_basic_event' 

    }, 

    { 

        // Just an event 

        title: 'Lunch', 

        start: '2017-02-12T12:00:00', 

        className: 'scheduler_basic_event', 

    }, 

    { 

        // Just an event 

        title: 'Happy Hour', 

        start: '2017-02-12T17:30:00', 

        className: 'scheduler_basic_event' 

    }, 

    {    

        // Monthly event 

        id: 111, 

        title: 'Meeting', 

        start: '2000-01-01T00:00:00', 

        className: 'scheduler_basic_event', 

        repeat: 1 

    }, 

    { 

        // Annual avent 

        id: 222, 

        title: 'Birthday Party', 

        start: '2017-02-04T07:00:00', 

        description: 'This is a cool event', 

        className: 'scheduler_basic_event', 

        repeat: 2 

    }, 

    { 

        // Weekday event 

        title: 'Click for Google', 

        url: 'http://google.com/', 

        start: '2017-02-28', 

        className: 'scheduler_basic_event', 

        dow: [1,5] 

    } 

]; 

 

// Any value represanting monthly repeat flag 

var REPEAT_MONTHLY = 1; 

// Any value represanting yearly repeat flag 

var REPEAT_YEARLY = 2; 

     

$('#calendar').fullCalendar({ 

    header: { 

        left: 'prev,next today', 

        center: 'title', 

        right: 'month,agendaWeek,agendaDay' 

    }, 

    editable: true, 

    // defaultDate: '2017-02-16', 

    eventSources: [defaultEvents], 

    dayRender: function( date, cell ) { 

    // Get all events 

    var events = $('#calendar').fullCalendar('clientEvents').length ? $('#calendar').fullCalendar('clientEvents') : defaultEvents; 

 

        // Start of a day timestamp 

        var dateTimestamp = date.hour(0).minutes(0); 

        var recurringEvents = new Array(); 

         

        // find all events with monthly repeating flag, having id, repeating at that day few months ago   

        var monthlyEvents = events.filter(function (event) { 

            return event.repeat === REPEAT_MONTHLY && 

            event.id && 

            moment(event.start).hour(0).minutes(0).diff(dateTimestamp, 'months', true) % 1 == 0 

        }); 

 

        // find all events with monthly repeating flag, having id, repeating at that day few years ago   

        var yearlyEvents = events.filter(function (event) { 

            return event.repeat === REPEAT_YEARLY && 

            event.id && 

            moment(event.start).hour(0).minutes(0).diff(dateTimestamp, 'years', true) % 1 == 0 

        }); 

 

        recurringEvents = monthlyEvents.concat(yearlyEvents); 

 

        $.each(recurringEvents, function(key, event) { 

        var timeStart = moment(event.start); 

         

        var currentDate = $('#calendar').fullCalendar('getDate'); 

        var calDate = currentDate.format('DD.MM.YYYY'); 

        console.log(calDate); 

 

        }); 

 

    } 

}); 

</script> 

</html> 