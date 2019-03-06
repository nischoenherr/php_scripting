<?php

class Calculation
{

    public function get_exp_position($nthposition) // First Method for Exponential
    {
        return exp($nthposition); // exp() is a defined function
    }


    public function get_factorial($numbertofactor) // Second Method for Factorial
    {
        $result = 1;
        for ($i = 1; $i <= $numbertofactor; $i++) { // loop with parameters
            $result = $result * $i;
        }
        return $result; // output
    }


    final static public function get_fibonacci($fibonacci_position) // Third Method to get the Fibonacci-function
    {
        $fibonacci_calc = array(0, 1); // Variable with array (values 0 and 1)
        for ($i = 1; $i <= $fibonacci_position; $i++) { // loop
            $calc_array = array_slice($fibonacci_calc, -2, 2); // Variable to cut array
            $fibonacci_calc[] = array_sum($calc_array); // connect array back to Variable
        }
        $result = array_slice($fibonacci_calc, -2, 1); // Output of array.
        return $result[0]; // output
    }


    public function get_pi($pi_position) // Fourth Method to get the position of pi
    {
        $long_pi = '3.1415926535897932384626433832795028841971693993751058209749445923078164062862089986280348253421170679821480865132823066470938446095505822317253594081284811174502841027019385211055596446229489549303819644288109756659334461284756482337867831652712019091456485669234603486104543266482133936072602491412737245870066063155881748815209209628292540917153643678925903600113305305488204665213841469519415116094330572703657595919530921861173819326117931051185480744623799627495673518857527248912279381830119491298336733624406566430860213949463952247371907021798609437027705392171762931767523846748184676694051320005681271452635608277857713427577896091736371787214684409012249534301465495853710507922796892589235420199561121290219608640344181598136297747713099605187072113499999983729780499510597317328160963185950244594553469083026425223082533446850352619311881710100031378387528865875332083814206171776691473035982534904287554687311595628638823537875937519577818577805321712268066130019278766111959092164201989';
        $pi_decimals = substr($long_pi, 2);

        $result = substr($pi_decimals, $pi_position - 1, 1);
        return $result; // output
    }


    function calculate_results($userinput) // function to output all results of the other functions
    {
        $result = array();

        // Call functions
        $result['Factorial'] = $this->get_factorial($userinput);
        $result['Exponential'] = $this->get_exp_position($userinput);
        $result['Fibonacci'] = $this->get_fibonacci($userinput);
        $result['Pi'] = $this->get_pi($userinput);

        return $result; // output
    }
}