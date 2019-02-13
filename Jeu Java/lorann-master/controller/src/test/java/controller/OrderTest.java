package controller;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;

public class OrderTest {
	private Order ord;
	
	@BeforeClass
	public static void setUpBeforeClass() throws Exception {
	}

	@AfterClass
	public static void tearDownAfterClass() throws Exception {
	}

	@Before
	public void setUp() throws Exception {
		ord = Order.NOPE;
	}

	@After
	public void tearDown() throws Exception {
	}

	@Test
	public void test() {
		Order expected = Order.NOPE;
		assertEquals(expected, ord );
	}

}
