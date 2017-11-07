
$(document).ready(function() {
    var educationIndex = 0;
    $('#addClient')
        // Add button click handler
        .on('click', '.addButton', function() {
            educationIndex++;
            var $template = $('#EducationTemplate'),
                $clone    = $template
                    .clone()
                    .removeClass('hide')
                    .removeAttr('id')
                    .attr('data-education-index', educationIndex)
                    .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="college"]').attr('name', 'education[' + educationIndex + '][college]').attr('required', 'required').end()
                .find('[name="degree"]').attr('name', 'education[' + educationIndex + '][degree]').attr('required', 'required').end()
                .find('[name="year"]').attr('name', 'education[' + educationIndex + '][year]').attr('required', 'required').end();

        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row  = $(this).parents('.form-group').first(),
                index = $row.attr('data-education-index');

            // Remove element containing the fields
            $row.remove();
        });
});
