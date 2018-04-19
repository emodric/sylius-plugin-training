@gift_wrapping
Feature: Gift wrapping
  In order to purchase a gift
  As a Visitor
  I want to have my order packed as gift

  Background:
    Given the store operates on a single channel in "United States"
    And the store has a product "PHP T-Shirt" priced at "$100.00"

  Scenario: Adding 10 dollars when gift wrapping is requested
    When I add product "PHP T-Shirt" to the cart
    And I request to pack my order as a gift
    And I update my cart
    Then my cart total should be "$110.00"

  Scenario: Do not add 10 dollars by default
    When I add product "PHP T-Shirt" to the cart
    And I update my cart
    Then my cart total should be "$100.00"

  Scenario: 10 dollars should be added only once
    When I add product "PHP T-Shirt" to the cart
    And I request to pack my order as a gift
    And I update my cart
    And I update my cart
    Then my cart total should be "$110.00"
