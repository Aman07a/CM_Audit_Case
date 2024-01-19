![cloudmazing-logo](https://github.com/Aman07a/CM_Audit_Case/assets/60389872/334acc89-d9e3-4cae-b1cf-d9fa5a7bba70)

# CloudMazing Audit Case

## Project Brief

![audit-uml](https://github.com/Aman07a/CM_Audit_Case/assets/60389872/a17ae097-e5d6-4200-bded-6480cbac9c58)

### Part 1

-   Create the given db structure
    -   User all ready exists
    -   Customer consist of the following items: Company Name
    -   Audit consist of the following items: Name, Question Progress Percentage
    -   Question consist of the following item: Name
 
-   Factory
    -   Seed the database with 5 customers each with an audit and 50 questions

-   Progress Percentage
    -   When a question is added to a customer update the Progress Percentage,
        with is the percentage of the number of questions answered.
        Each customer has to  answer as many question as the length of their name.
        If more questions are being added then it should raise exception.

-   Command
    -   Create a command the will execute a job for each costumer.
        The Job will have to check if the Question Progress is correctt.
        If it's correct is should states it should state this in the console with an info message,
        if the percentage is incorrect the it should state this in an error message.

        At the beginning of the command at set the last customer's progress to and invalid state,
        to ensure a false state.

-   Filament Resources OR LiveWire
    -   Create filament resources to fill the audits and answer questions.
        (resource and relation-manager) filamentphp.com
    -   OR
    -   Create LiveWire component(s) to add the items

### Part 2

-   API
    -   Create a command to fetch the items from the api:
        [admin.tradersvergelijken](https://admin.tradersvergelijken.nl/admin/login)
  
    -   List those items in a console table with per exchange the count of the items
