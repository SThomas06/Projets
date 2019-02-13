package controller;

import java.awt.EventQueue;

import model.SerialTest;
import view.fenetre1;

public class controllerJava {
	public controllerJava() {
			
		SerialTest main = new SerialTest();
		main.initialize();
		Thread t=new Thread() {
			public void run() {
				//the following line will keep this app alive for 1000 seconds,
				//waiting for events to occur and responding to them (printing incoming messages to console).
				try {Thread.sleep(1000000);} catch (InterruptedException ie) {}
			}
		};
		t.start();
		
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					fenetre1 window = new fenetre1();
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
		System.out.println("Started");
	}	
}
