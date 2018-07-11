<?php
/* Continue session. */
session_start(); 
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Total Coliform Negative Sample Submission</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

        <style>
            .container {
                display: none;
            }

            .preload {
                width: 100px;
                height: 100px;
                position: fixed;
                top: 40%;
                left: 50%;
            }

            .tt-query,
            .tt-hint {
                color: #999;
            }

            .tt-menu {
                margin-top: 12px;
                padding: 8px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
                */ margin-top: 2px;
                background-color: #FFF;
                border-radius: 5px;
                width: 390px;
                border: 1px solid rgba(0, 0, 0, 0.2);
                box-shadow: 0px 1.5px 9px 1px rgba(0, 0, 0, 0.12);
                padding: 10px 5px 15px;
            }

            .tt-dropdown-menu,
            .tt-menu {
                max-height: 180px;
                overflow-y: auto;
            }

            .tt-suggestion {
                padding: 3px 10px;
                line-height: 20px;
                font-size: inherit;
                border-bottom: 1px solid #d1dce5
            }

            .tt-suggestion:hover {
                cursor: pointer;
                background-color: #344959;
                color: #FFF;
            }

            .tt-suggestion.tt-is-under-cursor,
            .tt-suggestion.tt-cursor {
                color: #fff;
                background-color: #0097cf;
            }

            .tt-suggestion p {
                margin: 0;
            }

            .typeahead {
                width: 500px;
            }
        </style>

    </head>

    <body>

        <?php
	/* Check to see if user is logged in. */
            if(isset($_SESSION['username']) && $_SESSION['username'] != "")
                {
         ?>

            <div class="preload">
                <img src="img/loading.gif" />
            </div>

            <div class="container">

                <h1>Total Coliform Negative Sample Submission:
                    <?php 

/* Convert primacy agency code to human readable format. */

switch ($_SESSION['primacyagency']) {
    case '01':
	echo 'EPA Region 1';
        break;
    case '02':
	echo 'EPA Region 2';
        break;
    case '03':
	echo 'EPA Region 3';
        break;
    case '04':
	echo 'EPA Region 4';
        break;
    case '05':
	echo 'EPA Region 5';
        break;
    case '06':
	echo 'EPA Region 6';
        break;
    case '07':
	echo 'EPA Region 7';
        break;
    case '08':
	echo 'EPA Region 8';
        break;
    case '09':
	echo 'EPA Region 9';
        break;
    case '10':
	echo 'EPA Region 10';
        break;
    case 'AK':
	echo 'Alaska';
        break;
    case 'AL':
	echo 'Alabama';
        break;
    case 'AR':
        echo 'Arkansas';
        break;
    case 'AS':
        echo 'American Samoa';
        break;
    case 'AZ':
        echo 'Arizona';
        break;
    case 'CA':
        echo 'California';
        break;
    case 'CO':
        echo 'Colorado';
        break;
    case 'CT':
        echo 'Connecticut';
        break;
    case 'DC':
        echo 'District of Columbia';
        break;
    case 'DE':
        echo 'Delaware';
        break;
    case 'FL':
        echo 'Florida';
        break;
    case 'GA':
        echo 'Georgia';
        break;
    case 'GU':
        echo 'Guam';
        break;
    case 'HI':
        echo 'Hawaii';
        break;
    case 'IA':
        echo 'Iowa';
        break;
    case 'ID':
        echo 'Idaho';
        break;
    case 'IL':
        echo 'Illinois';
        break;
    case 'IN':
        echo 'Indiana';
        break;
    case 'KS':
        echo 'Kansas';
        break;
    case 'KY':
        echo 'Kentucky';
        break;
    case 'LA':
        echo 'Louisiana';
        break;
    case 'MA':
        echo 'Massachusetts';
        break;
    case 'MD':
        echo 'Maryland';
        break;
    case 'ME':
        echo 'Maine';
        break;
    case 'MI':
        echo 'Michigan';
        break;
    case 'MN':
        echo 'Minnesota';
        break;
    case 'MO':
        echo 'Missouri';
        break;
    case 'MP':
        echo 'Northern Mariana Isl';
        break;
    case 'MS':
        echo 'Mississippi';
        break;
    case 'MT':
        echo 'Montana';
        break;
    case 'NC':
        echo 'North Carolina';
        break;
    case 'ND':
        echo 'North Dakota';
        break;
    case 'NE':
        echo 'Nebraska';
        break;
    case 'NH':
        echo 'New Hampshire';
        break;
    case 'NJ':
        echo 'New Jersey';
        break;
    case 'NM':
        echo 'New Mexico';
        break;
    case 'NN':
        echo 'Navajo Nation';
        break;
    case 'NV':
        echo 'Nevada';
        break;
    case 'NY':
        echo 'New York';
        break;
    case 'OH':
        echo 'Ohio';
        break;
    case 'OK':
        echo 'Oklahoma';
        break;
    case 'OR':
        echo 'Oregon';
        break;
    case 'PA':
        echo 'Pennsylvania';
        break;
    case 'PR':
        echo 'Puerto Rico';
        break;
    case 'PW':
        echo 'Palau';
        break;
    case 'RI':
        echo 'Rhode Island';
        break;
    case 'SC':
        echo 'South Carolina';
        break;
    case 'SD':
        echo 'South Dakota';
        break;
    case 'TN':
        echo 'Tennessee';
        break;
    case 'TX':
        echo 'Texas';
        break;
    case 'UT':
        echo 'Utah';
        break;
    case 'VA':
        echo 'Virginia';
        break;
    case 'VI':
        echo 'US Virgin Islands';
        break;
    case 'VT':
        echo 'Vermont';
        break;
    case 'WA':
        echo 'Washington';
        break;
    case 'WI':
        echo 'Wisconsin';
        break;
    case 'WV':
        echo 'West Virginia';
        break;
    case 'WY':
        echo 'Wyoming';
        break;
    default:
        echo 'Primacy Agency Unknown!';

}
?>
                </h1>
                <form class="form-horizontal" action="/form_process.php" method="post">


                    <div id="pwsiddiv" class="form-group">
                        <label class="control-label col-sm-2" for="watersystemid">Water System ID:</label>
                        <div class="col-sm-10">
                            <input class="typeahead form-control" id="pwsidfield" name="watersystemid" data-provider="typeahead" placeholder="Start Typing to Search" size="50" />
                        </div>
                    </div>

                    <div id="facilityiddiv" class="form-group"></div>

                    <div id="samplepointiddiv" class="form-group"></div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="samplecollecteddate">Sampling Collected Date:</label>
                        <div class="col-sm-10">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" name="samplecollecteddate" />
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="samplecollecteddate">Lab Received Date:</label>
                        <div class="col-sm-10">
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' class="form-control" name="samplereceiveddate" />
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sampleforcompliance">Sample for compliance purposes?</label>
                        <div class="col-sm-10">
                            <input type='hidden' value="N" id="sampleforcompliancefalse" name='sampleforcompliance'>
                            <input type="checkbox" value="Y" id="sampleforcompliance" name="sampleforcompliance">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="samplecomments">Sample Comment:</label>
                        <textarea class="form-control" rows="5" id="samplecomments" name="samplecomments"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="samplelabidcode">Sample Lab ID Code:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="samplelabidcode" name="samplelabidcode">
                        </div>
                    </div>

                    <div id="legalentityiddiv" class="form-group">
                        <label class="control-label col-sm-2" for="legalentityid">Lab ID:</label>
                        <div class="col-sm-10">
                            <input class="typeahead form-control" id="legalentityidfield" name="legalentityid" data-provider="typeahead" placeholder="Start Typing to Search" size="50" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="samplecollecteddate">Sample Result Agency Received Date:</label>
                        <div class="col-sm-10">
                            <div class='input-group date' id='datetimepicker3'>
                                <input type='text' class="form-control" name="sampleagencyreceiveddate" />
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>

            </div>
            <script>
                $(window).on('load', function() {

                    if (document.getElementById("sampleforcompliance").checked) {
                        document.getElementById("sampleforcompliancefalse").disabled = true;
                    }

                    // Restrict date time picker from allowing future dates to be selected.

                    $('#datetimepicker1').datetimepicker({
                        maxDate: moment()
                    });
                    $('#datetimepicker2').datetimepicker({
                        maxDate: moment()
                    });
                    $('#datetimepicker3').datetimepicker({
                        maxDate: moment()
                    });

                    $(".preload").fadeOut(6000, function() {
                        $(".container").fadeIn(1000);
                    });

                    // BEGIN Water System ID Typeahead

                    var dataSource1 = new Bloodhound({

                        datumTokenizer: function(d) {
                            var pwstoken = Bloodhound.tokenizers.whitespace(d.pwsid + d.pwsname);
                            $.each(pwstoken, function(k, v) {
                                i = 0;
                                while ((i + 1) < v.length) {
                                    pwstoken.push(v.substr(i, v.length));
                                    i++;
                                }
                            })
                            return pwstoken;
                        },
                        queryTokenizer: Bloodhound.tokenizers.whitespace,

                        prefetch: {
                            url: '[SERVER PATH]/json2.php?pa=<?php echo $_SESSION['primacyagency']; ?>'
                        }
                    });


                    // clear suggestions loaded from local and prefetch
                    dataSource1.clear();

                    // clear prefetch data stored in local storage
                    dataSource1.clearPrefetchCache();

                    // clear cache of responses generated by remote requests
                    dataSource1.clearRemoteCache();

                    // reinitialize the suggestion engine i.e. load data 
                    // from `local` and `prefetch`
                    dataSource1.initialize(true); // have to pass true in order to reinitialize

                    $('#pwsiddiv .typeahead').typeahead({
                        minLength: 1,
                        highlight: true
                    }, {
                        displayKey: 'pwsid',
                        display: function(item) {
                            return item.pwsid
                        },
                        source: dataSource1.ttAdapter(),
                        templates: {
                            empty: [
                                '<div class="empty">No Matches Found</div>'
                            ].join('\n'),
                            suggestion: function(data) {
                                return '<div>' + data.pwsname + ' - ' + data.pwsid + '</div>'
                            }
                        }
                    });

                    // END Water System ID Typeahead

                    // BEGIN Lab ID Typeahead

                    var dataSource3 = new Bloodhound({

                        datumTokenizer: function(d) {
                            var legaltoken = Bloodhound.tokenizers.whitespace(d.legalentityid + d.legalentityorgname);
                            $.each(legaltoken, function(k, v) {
                                i = 0;
                                while ((i + 1) < v.length) {
                                    legaltoken.push(v.substr(i, v.length));
                                    i++;
                                }
                            })
                            return legaltoken;
                        },
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        prefetch: {
                            url: '[SERVER PATH]/json4.php?pa=<?php echo $_SESSION['primacyagency']; ?>'
                        }
                    });


                    // clear suggestions loaded from local and prefetch
                    dataSource3.clear();

                    // clear prefetch data stored in local storage
                    dataSource3.clearPrefetchCache();

                    // clear cache of responses generated by remote requests
                    dataSource3.clearRemoteCache();

                    // reinitialize the suggestion engine i.e. load data 
                    // from `local` and `prefetch`
                    dataSource3.initialize(true); // have to pass true in order to reinitialize

                    $('#legalentityiddiv .typeahead').typeahead({
                        minLength: 1,
                        highlight: true
                    }, {
                        displayKey: 'legalentityid',
                        display: function(item) {
                            return item.legalentityid
                        },
                        source: dataSource3.ttAdapter(),
                        templates: {
                            empty: [
                                '<div class="empty">No Matches Found</div>'
                            ].join('\n'),
                            suggestion: function(data) {
                                return '<div>' + data.legalentityorgname + ' - ' + data.legalentityid + '</div>'
                            }
                        }
                    });



                });

                // END Lab ID Typeahead

                // BEGIN Facility ID Typeahead

                var count = 0;

                $('input#pwsidfield').on('typeahead:selected', function(object, datum) {
                    console.log('typeahead:selected');
                    $(this).trigger('typeahead:_done', [object, datum]);
                    // incrementing count
                    count++;

                    //$("#pwsidfield").blur(function() {
                    // creating a new <div id=count></div>
                    console.log(count);

                    if (count == 1) {
                        $("input#pwsidfield").prop('readonly', true);
                        $("input#pwsidfield").typeahead("destroy");
                        var div = $('<div>').attr('id', count).addClass('col-sm-10');

                        // creating a new <input id=count class="typeahead" placeholder=".."></input> 
                        var input = $('<input>').attr('name', 'facilityid').attr('id', 'typeahead' + count)
                            .addClass('typeahead')
                            .addClass('form-control')
                            .prop('placeholder', 'Enter Search');

                        div.append('<label class="control-label col-sm-2" for="facilityid">Facility ID:</label>');
                        div.append(input); // appending the input to the div


                        val = document.getElementById("pwsidfield").value;

                        var dataSource = new Bloodhound({
                            datumTokenizer: function(d) {
                                var facilitytoken = Bloodhound.tokenizers.whitespace(d.facilityid + d.facilityname);
                                $.each(facilitytoken, function(k, v) {
                                    i = 0;
                                    while ((i + 1) < v.length) {
                                        facilitytoken.push(v.substr(i, v.length));
                                        i++;
                                    }
                                })
                                return facilitytoken;
                            },
                            queryTokenizer: Bloodhound.tokenizers.whitespace,

                            prefetch: {
                                url: '[SERVER PATH]/json.php?pa=<?php echo $_SESSION['primacyagency']; ?>&wsid=' + val

                            }
                            //  });

                        });

                        // clear suggestions loaded from local and prefetch
                        dataSource.clear();

                        // clear prefetch data stored in local storage
                        dataSource.clearPrefetchCache();

                        // clear cache of responses generated by remote requests
                        dataSource.clearRemoteCache();

                        // reinitialize the suggestion engine i.e. load data 
                        // from `local` and `prefetch`
                        dataSource.initialize(true); // have to pass true in order to reinitialize

                        // attaching typeahead to the newly creating input
                        input.typeahead({
                            minLength: 0,
                            highlight: true
                        }, {
                            displayKey: 'facilityid',
                            display: function(item) {
                                return item.facilityid
                            },
                            source: dataSource.ttAdapter(),
                            templates: {
                                empty: [
                                    '<div class="empty">No Matches Found</div>'
                                ].join('\n'),
                                suggestion: function(data) {
                                    return '<div>' + data.facilityname + ' - ' + data.facilityid + '</div>'
                                }
                            }
                        });

                        // appending our newly creating div with all the element inside
                        $("#facilityiddiv").append(div);

                    }

                    // END Facility ID Typeahead

                    // BEGIN Sample Point ID Typeahead

                    var count2 = 0;

                    $('input#typeahead1').on('typeahead:selected', function(object, datum) {
                        console.log('typeahead1:selected');

                        // incrementing count
                        count2++;

                        // creating a new <div id=count2></div>
                        console.log(count2);

                        if (count2 == 1) {
                            $("input#typeahead1").prop('readonly', true);
                            $("input#typeahead1").typeahead("destroy");
                            var div = $('<div>').attr('id', count2).addClass('col-sm-10');

                            // creating a new <input id=count class="typeahead" placeholder=".."></input> 
                            var input = $('<input>').attr('name', 'samplingpointid').attr('id', 'typeahead' + count2)
                                .addClass('typeahead')
                                .addClass('form-control')
                                .prop('placeholder', 'Enter Search');

                            div.append('<label class="control-label col-sm-2" for="samplingpointid">Sampling Point ID:</label>');
                            div.append(input); // appending the input to the div


                            val = document.getElementById("pwsidfield").value;
                            val2 = document.getElementById("typeahead1").value;

                            var dataSource2 = new Bloodhound({
                                datumTokenizer: function(d) {
                                    var sampletoken = Bloodhound.tokenizers.whitespace(d.samplepointid + d.samplepointname);
                                    $.each(sampletoken, function(k, v) {
                                        i = 0;
                                        while ((i + 1) < v.length) {
                                            sampletoken.push(v.substr(i, v.length));
                                            i++;
                                        }
                                    })
                                    return sampletoken;
                                },
                                queryTokenizer: Bloodhound.tokenizers.whitespace,

                                prefetch: {
                                    url: '[SERVER PATH]/json3.php?pa=<?php echo $_SESSION['primacyagency']; ?>&ws=' + val + '&f=' + val2
                                }
                                //  });

                            });

                            // clear suggestions loaded from local and prefetch
                            dataSource2.clear();

                            // clear prefetch data stored in local storage
                            dataSource2.clearPrefetchCache();

                            // clear cache of responses generated by remote requests
                            dataSource2.clearRemoteCache();

                            // reinitialize the suggestion engine i.e. load data 
                            // from `local` and `prefetch`
                            dataSource2.initialize(true); // have to pass true in order to reinitialize

                            // attaching typeahead to the newly creating input
                            input.typeahead({
                                minLength: 0,
                                highlight: true
                            }, {
                                displayKey: 'samplepointid',
                                display: function(item) {
                                    return item.samplepointid
                                },
                                source: dataSource2.ttAdapter(),
                                templates: {
                                    empty: [
                                        '<div class="empty">No Matches Found</div>'
                                    ].join('\n'),
                                    suggestion: function(data) {
                                        return '<div>' + data.samplepointname + ' - ' + data.samplepointid + '</div>'
                                    }
                                }
                            });

                            // appending our newly creating div with all the element inside
                            $("#samplepointiddiv").append(div);

                        }
                    });

                    // END Sample Point ID Typeahead


                });
            </script>

            <?php 
                 }
            else{
                    header('Location: index.php'); //redirect URL
                }
        ?>

    </body>

    </html>