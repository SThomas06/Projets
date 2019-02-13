package view;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JLabel;
import javax.swing.JButton;
import javax.swing.JSeparator;

import java.awt.Color;
import java.awt.EventQueue;
import java.awt.Font;
import java.awt.BorderLayout;
import java.awt.SystemColor;

import javax.swing.SwingConstants;
import javax.swing.ImageIcon;

import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.UIManager;
import java.awt.GridLayout;

import model.assignData;
import model.SerialTest;

public class fenetre1 extends JFrame {
	
	private Panel pan = new Panel();
	private JFrame fenetre = new JFrame();
	private JButton boutonUp = new JButton("AUGMENTER");
	private JButton boutonDown = new JButton("DIMINUER");
	
	private static final int headerY = 85;
	private static final int footerY = 80;

	public fenetre1() {
		initialize();
	}

	private void initialize() {
		
		fenetre.setTitle("PimpMyFridge: PAUL / THOMAS / YOANN / ALEXIS");
	    fenetre.setSize(1900, 1000);
	    fenetre.setLocationRelativeTo(null);
	    fenetre.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);      
	    fenetre.setBackground(Color.LIGHT_GRAY);
	    fenetre.setLocationRelativeTo(null);
	    fenetre.setResizable(false);
	    
	    pan.setLayout(null);
	    
	    boutonUp.setBackground(Color.RED);
	    boutonUp.setForeground(Color.WHITE);
	    boutonUp.setFont(new Font("Arial", Font.PLAIN, 24));
	    boutonUp.setBounds(680, 910, 250, 50);
	    boutonUp.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e)
            {
                //Execute when button is pressed
                System.out.println("Augmente: " + assignData.getConsigne() + " -> " + (assignData.getConsigne()+1) );
                assignData.setConsigne(assignData.getConsigne() + 1);
                SerialTest.changementConsigne(String.valueOf(assignData.getConsigne()));
                pan.repaint();
            }
        });
	    
	    boutonDown.setBackground(Color.BLUE);
	    boutonDown.setForeground(Color.WHITE);
	    boutonDown.setFont(new Font("Arial", Font.PLAIN, 24));
	    boutonDown.setBounds(1000, 910, 250, 50);
	    boutonDown.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e)
            {
                //Execute when button is pressed
            	System.out.println("Diminue: " + assignData.getConsigne() + " -> " + (assignData.getConsigne()-1) );
                assignData.setConsigne(assignData.getConsigne() - 1);
                SerialTest.changementConsigne(String.valueOf(assignData.getConsigne()));
                pan.repaint();
            }
	    });
	    pan.add(boutonUp);
	    pan.add(boutonDown);
	    
	    fenetre.setContentPane(pan);	    
	    fenetre.setVisible(true);
	}
}
