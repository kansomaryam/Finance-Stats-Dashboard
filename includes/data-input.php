<?php

// Function to display the input form and handle submissions
function fsd_input_form() {
    ?>
    <form method="post" action="">
        <input type="text" name="revenue" placeholder="Enter Revenue" required />
        <input type="text" name="expenses" placeholder="Enter Expenses" required />
        <input type="submit" name="submit" value="Save Data" />
    </form>
    <?php

    if (isset($_POST['submit'])) {
        // Sanitize input and save data
        $revenue = sanitize_text_field($_POST['revenue']);
        $expenses = sanitize_text_field($_POST['expenses']);
        update_option('fsd_revenue', $revenue);
        update_option('fsd_expenses', $expenses);
    }
}
