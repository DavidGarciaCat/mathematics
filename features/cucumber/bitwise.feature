Feature: Bitwise operations through the API endpoints

  Scenario: Bitwise AND - test 1
    When I send a "POST" request to "/api/bitwise/and" with the following body
    """
    {
      "number1": 0,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 0
    }
    """

  Scenario: Bitwise AND - test 2
    When I send a "POST" request to "/api/bitwise/and" with the following body
    """
    {
      "number1": 1,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 1
    }
    """

  Scenario: Bitwise AND - test 3
    When I send a "POST" request to "/api/bitwise/and" with the following body
    """
    {
      "number1": 2,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 0
    }
    """

  Scenario: Bitwise AND - test 4
    When I send a "POST" request to "/api/bitwise/and" with the following body
    """
    {
      "number1": 4,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 4
    }
    """

  Scenario: Bitwise AND - test 5
    When I send a "POST" request to "/api/bitwise/and" with the following body
    """
    {
      "number1": 8,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 0
    }
    """

  Scenario: Bitwise AND with empty body
    When I send a "POST" request to "/api/bitwise/and" with an empty body
    Then the response should report a Bad Request error

  Scenario: Bitwise Inclusive OR - test 1
    When I send a "POST" request to "/api/bitwise/or" with the following body
    """
    {
      "number1": 0,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 5
    }
    """

  Scenario: Bitwise Inclusive OR - test 2
    When I send a "POST" request to "/api/bitwise/or" with the following body
    """
    {
      "number1": 1,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 5
    }
    """

  Scenario: Bitwise Inclusive OR - test 3
    When I send a "POST" request to "/api/bitwise/or" with the following body
    """
    {
      "number1": 2,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 7
    }
    """

  Scenario: Bitwise Inclusive OR - test 4
    When I send a "POST" request to "/api/bitwise/or" with the following body
    """
    {
      "number1": 4,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 5
    }
    """

  Scenario: Bitwise Inclusive OR - test 5
    When I send a "POST" request to "/api/bitwise/or" with the following body
    """
    {
      "number1": 8,
      "number2": 5
    }
    """
    Then the response should be like
    """
    {
      "result": 13
    }
    """

  Scenario: Bitwise Inclusive OR with empty body
    When I send a "POST" request to "/api/bitwise/or" with an empty body
    Then the response should report a Bad Request error
