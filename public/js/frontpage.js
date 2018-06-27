                function getData() {
                    jQuery.getJSON('/football/live/home', function(data) {

                     var generate_html = '';
                     var todayDate = '';


                        for (var i in data) {

                            eventId = data[i].eventId;
                            name = data[i].name;
                            linkedEventTypeName = data[i].linkedEventTypeName;
                            typeId = data[i].typeId;
                            startDate = data[i].startDate;
                            startTime = data[i].startTime;
                            scoreHome = data[i].scoreHome;
                            scoreAway = data[i].scoreAway;
                            teamHome = data[i].teamHome;
                            teamAway = data[i].teamAway;
                            status_active = data[i].status_active;
                            status_started = data[i].status_started;
                            status_live = data[i].status_live;
                            status_resulted = data[i].status_resulted;
                            status_finished = data[i].status_finished;
                            status_cashoutable = data[i].status_cashoutable;
                            status_displayable = data[i].status_displayable;
                            status_suspended = data[i].status_suspended;
                            status_requestabet = data[i].status_requestabet;
                            superBoostCount = data[i].superBoostCount;  

                            //markets
                            marketName = data[i].marketName; 
                            marketId = data[i].marketId; 
                            marketType = data[i].marketType; 
                            marketPrice = data[i].marketPrice; 

                            if (!todayDate) {
                              generate_html += '<div class="game-startdate">'+startDate+'</div>';
                            } 
                              todayDate = startDate;



                            generate_html += '<div class="match-cell" data-oc-id="' + eventId + '">';
                            generate_html += '<div class="match-time">' + startTime + '</div>';                      
                            generate_html += '<div class="match-name"><span>' + name + '</span></div>';
                            generate_html += '<a class="leaderboard-items" href="/market/'+eventId+'" data-link="/events/'+eventId+'"></a>';
                            generate_html += '<div id="prim-' + eventId + '" class="market-main" >Name:' + marketName +' | Type: ' + marketType + '  | Price: ' + marketPrice + '</div>';
                            generate_html += '</div>';


                          }

                         if( data == '' ){
                              generate_html = 'No Live Football games today.';
                          }    

                        document.getElementById("live_scores").innerHTML = generate_html;       
                    });
                }
                setInterval(getData, 10000);

               
                jQuery(function() {
                    getData();
                });


