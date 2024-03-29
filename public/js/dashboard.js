        //Get the id="events" container
        var eventsContainer = document.getElementById("events");

        //Get the stored values in our localstorage with a key of "Events"
        var storedEvents = localStorage.getItem("events");
        
        //Parse those value
        var existingEvents = JSON.parse(storedEvents) || [];
        console.log(existingEvents);

        //existingEvents[1] and so on
        //existingEvents[0]events[0] its format is something lik this

        //For each number of details we retrieved lets get the events and those events are single but rather can be multiple
        for (let i = 0; i < existingEvents.length; i++) {
            var dateObj = existingEvents[i]; // Get the date object
            var events = dateObj.events; // Get the array of events for this date
            var date = dateObj.day;
            var months = dateObj.month;
            var month = getMonthName(months);
        
            // Loop through each event for this date
            for (let j = 0; j < events.length; j++) {
                var event = events[j]; // Get the event object
                var title = event.title; // Get the title of the event
                var time = event.time; // Get the time of the event
        
                // Create a div element for each event
                var eventDiv = document.createElement("div");
                eventDiv.classList.add("items");
        
                // Create a div element for event details
                var detailDiv = document.createElement("div");
                detailDiv.classList.add("detail");
        
                // Create an h3 element for the event title
                var titleHeading = document.createElement("h3");
                titleHeading.textContent = title;
        
                // Create a p element for the event time
                var timeParagraph = document.createElement("p");
                timeParagraph.textContent = time;
        
                // Create a p element for the event date
                var dateParagraph = document.createElement("p");
                dateParagraph.classList.add("date");
                dateParagraph.textContent = `${month} ${date}`;
        
                // Append title and time to the detail div
                detailDiv.appendChild(titleHeading);
                detailDiv.appendChild(timeParagraph);
        
                // Append detail div and date to the event div
                eventDiv.appendChild(detailDiv);
                eventDiv.appendChild(dateParagraph);
        
                // Append the event div to the events container
                eventsContainer.appendChild(eventDiv);
            }
        }
        
        // Function to get month name from month number
        function getMonthName(monthNumber) {
            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            return months[monthNumber - 1];
        }
