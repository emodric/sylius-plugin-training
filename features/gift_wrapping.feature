@gift_wrapping
Feature: Gift wrapping
  In order to purchase a gift
  As a Visitor
  I want to have my order packed as gift

  Background:
    Given the store operates on a single channel in "United States"
    And the store has a product "PHP T-Shirt" priced at "$100.00"

  Scenario: Receiving fixed discount for my cart
    When I add product "PHP T-Shirt" to the cart
    And I request to pack my order as a gift
    Then my cart total should be "$110.00"
