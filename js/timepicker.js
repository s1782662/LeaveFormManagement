$('#datetimepicker .time').timepicker({
	'useSelect':true,
	'showDuration': false,
    'timeFormat': 'g:ia'
	
  });

$('#datetimepicker .date').datepicker({
	'format': 'dd-mm-yyyy',
    'autoclose': true,
	'startDate':'+0d',
	'endDate':'+10d'
   });

$('#datetimepicker').datepair();
