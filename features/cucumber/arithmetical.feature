Feature: Arithmetical​ operations through the API endpoints

  Scenario: Sum two integers
    When I send a "POST" request to "/api/arithmetical/add" with the following body
    """
    {
      "number1": 3,
      "number2": 2
    }
    """
    Then the response should be like
    """
    {
      "result": 5
    }
    """

  Scenario: Sum two numbers with empty body
    When I send a "POST" request to "/api/arithmetical/add" with an empty body
    Then the response should report a Bad Request error

  Scenario: Subtract two integers
    When I send a "POST" request to "/api/arithmetical/sub" with the following body
    """
    {
      "number1": 3,
      "number2": 2
    }
    """
    Then the response should be like
    """
    {
      "result": 1
    }
    """

  Scenario: Subtract two numbers with empty body
    When I send a "POST" request to "/api/arithmetical/sub" with an empty body
    Then the response should report a Bad Request error

  Scenario: Multiply two integers
    When I send a "POST" request to "/api/arithmetical/mul" with the following body
    """
    {
      "number1": 4,
      "number2": 2
    }
    """
    Then the response should be like
    """
    {
      "result": 8
    }
    """

  Scenario: Multiply two numbers with empty body
    When I send a "POST" request to "/api/arithmetical/mul" with an empty body
    Then the response should report a Bad Request error

  Scenario: Divide two integers
    When I send a "POST" request to "/api/arithmetical/div" with the following body
    """
    {
      "number1": 6,
      "number2": 2
    }
    """
    Then the response should be like
    """
    {
      "result": 3
    }
    """

  Scenario: Divide two numbers with empty body
    When I send a "POST" request to "/api/arithmetical/div" with an empty body
    Then the response should report a Bad Request error
