package controller;

import java.awt.event.KeyEvent;

public class EventPerformer {
	private ControllerFacade orderPerformer;
	
	public EventPerformer(ControllerFacade orderPerformer) {
		this.orderPerformer = orderPerformer;
	}
	
	public void eventPerform(KeyEvent keyEvent) {
		this.orderPerformer.orderPerform(this.keyCodeToOrder(keyEvent.getKeyCode()));
	}
	
	private Order keyCodeToOrder(int keyCode) {
		switch(keyCode) {
		case KeyEvent.VK_UP:
			return Order.UP;
		case KeyEvent.VK_LEFT:
			return Order.LEFT;
		case KeyEvent.VK_DOWN:
			return Order.DOWN;
		case KeyEvent.VK_RIGHT:
			return Order.RIGHT;
		case KeyEvent.VK_SPACE:
			return Order.SPELL;
		case KeyEvent.VK_ESCAPE:
			return Order.ESCAPE;
		default:
			return Order.NOPE;
		}
	}
}
