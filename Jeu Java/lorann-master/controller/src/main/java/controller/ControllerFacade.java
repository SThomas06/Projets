package controller;

import java.awt.Point;
import java.awt.Rectangle;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.io.IOException;
import java.sql.SQLException;
import java.util.List;
import java.util.Random;

import javax.swing.JOptionPane;

import model.Direction;
import model.IModel;
import model.Level;
import model.pawns.Monster1;
import model.pawns.Monster2;
import model.pawns.Monster3;
import model.pawns.Monster4;
import model.pawns.Player;
import model.pawns.Spell;
import model.pawns.Thibault;
import showboard.IPawn;
import showboard.ISquare;
import showboard.squares.*;
import showboard.squares.Void;
import view.IView;


/**
 * <h1>The Class ControllerFacade provides a facade of the Controller component.</h1>
 *
 * @author Jean-Aymeric DIET jadiet@cesi.fr
 * @version 1.0
 */
public class ControllerFacade implements IController, KeyListener {

    /** The view. */
    private final IView  view;

    /** The model. */
    private final IModel model;
    
    private final EventPerformer eventPerformer;
    
    private Order order;
    
    private List<IPawn> pawns;
    
    private boolean isLaunched;
    
    private Player player;
    private Spell spell;
    private Monster1 mon1;
    private Monster2 mon2;
    private Monster3 mon3;
    private Monster4 mon4;
    private Thibault boss;
    
    private int pls;
	
    /**
     * Instantiates a new controller facade.
     *
     * @param view
     *            the view
     * @param model
     *            the model
     */
    public ControllerFacade(final IView view, final IModel model) {
        this.view = view;
        this.model = model;
        this.eventPerformer = new EventPerformer(this);
        this.order = Order.NOPE;
        this.isLaunched = false;
    }

    /**
     * Start.
     *
     * @throws SQLException
     *             the SQL exception
     */
    public void start() throws SQLException {
    	int index = 0;
        while (true) {
        	String[] buttons = {"Training", "Level 1", "Level 2", "Level 3", "Level 4", "Level 5", "Final Fight"};
        	int choice = this.getView().choseLevel("Please chose a level:", "Lorann Game", buttons, index);
        	final List<Level> level;
        	boolean leave = false;
        	pls = 0;
        	
        	switch (choice) {
        	case 0:
        		level = this.getModel().getTraining();
        		pls = 1;
        		break;
        	case 1:
        		level = this.getModel().getLevel1();
        		break;
        	case 2:
        		level = this.getModel().getLevel2();
        		break;
        	case 3:
        		level = this.getModel().getLevel3();
        		break;
        	case 4:
        		level = this.getModel().getLevel4();
        		break;
        	case 5:
        		level = this.getModel().getLevel5();
        		break;
        	case 6:
        		level = this.getModel().getFinalLevel();
        		break;
        	default:
        		level = null;
        		leave = true;
        		pls = 0;
        		break;
        	}
            
        	if (!leave) {
	            this.pawns = this.getModel().setPawns(level);
	            this.getView().setLevel(this, level);
	            
	            for(int i = 0; i < this.pawns.size(); i++) {
	            	if (this.pawns.get(i) instanceof Player) {
	            		player = (Player) this.pawns.get(i);
	            	}
	            	if (this.pawns.get(i) instanceof Spell) {
	            		spell = (Spell) this.pawns.get(i);
	            	}
	            	if (this.pawns.get(i) instanceof Monster1) {
	            		mon1 = (Monster1) this.pawns.get(i);
	            	}
	            	if (this.pawns.get(i) instanceof Monster2) {
	            		mon2 = (Monster2) this.pawns.get(i);
	            	}
	            	if (this.pawns.get(i) instanceof Monster3) {
	            		mon3 = (Monster3) this.pawns.get(i);
	            	}
	            	if (this.pawns.get(i) instanceof Monster4) {
	            		mon4 = (Monster4) this.pawns.get(i);
	            	}
	            	if (this.pawns.get(i) instanceof Thibault) {
	            		boss = (Thibault) this.pawns.get(i);
	            	}
	            	
	            }
	            this.getView().getGameFrame().addPawns(this.pawns);
	            
	        	this.mainLoop();
        	} else {
        		break;
        	}
        	index++;
        }
    }

    /**
     * Gets the view.
     *
     * @return the view
     */
    public IView getView() {
        return this.view;
    }

    /**
     * Gets the model.
     *
     * @return the model
     */
    public IModel getModel() {
        return this.model;
    }
    
    public EventPerformer getEventPerformer() {
    	return this.eventPerformer;
    }
    
    public void orderPerform(Order order) {
    	if (order != Order.NOPE) {
    		this.order = order;
    	}
    }
    
    public void launchSpell() {
    	this.isLaunched = true;
    	
    	Direction dir = this.player.getDirection();
    	Point position = new Point(this.player.getPosition());
    	
    	if (dir == Direction.NEUTRAL) {
    		Random rand = new Random();
    		switch(rand.nextInt(4)) {
    		case 0:
    			dir = Direction.UP;
    			break;
    		case 1:
    			dir = Direction.LEFT;
    			break;
    		case 2:
    			dir = Direction.DOWN;
    			break;
    		case 3:
    			dir = Direction.RIGHT;
    			break;
    		}
    	}
    	this.spell.setPosition(position);
    	this.spell.setDirection(dir);
    }

    public void mainLoop() {
    	boolean spellPass = true;
    	boolean loop = true;
    	boolean justNow;
    	boolean ready = false;
    	ISquare[][] squares = this.getView().getGameFrame().getSquares();
    	Rectangle rect = new Rectangle(this.boss.getX()*32, this.boss.getY()*32, this.boss.getWidth(), this.boss.getHeight());
    	Rectangle myRect = new Rectangle(this.player.getX()*32, this.player.getY()*32, this.player.getWidth(), this.player.getHeight());
    	Rectangle spellRect = new Rectangle(this.spell.getX()*32, this.spell.getY()*32, this.spell.getWidth(), this.spell.getHeight());

    	while(loop) {
    		justNow = false;
    		this.player.refresh();
    		if (this.order == Order.UP || this.order == Order.LEFT || this.order == Order.DOWN || this.order == Order.RIGHT) {
    			this.getModel().move(this.order, this.getView());
    			myRect = new Rectangle(this.player.getX()*32, this.player.getY()*32, this.player.getWidth(), this.player.getHeight());
    			ready = true;
    		}
    		
    		if (this.order == Order.SPELL) {
    			if (this.isLaunched == false) {
    				this.launchSpell();
    				justNow = true;
    				ready = true;
    			} else {
    				this.spell.comeBack(this.player.getPosition(), squares);
    			}
    		}
    			
    		this.order = Order.NOPE;
    		
    		if (ready) {
	    		if (this.boss.isAlive()) {
	    			this.boss.attack(this.player.getPosition(), squares);
	    			this.boss.animate();
	    		}
	    		if (this.mon1.isAlive() && pls != 1)
	    			this.mon1.move(this.player.getPosition(), squares);
	    		if (this.mon2.isAlive() && pls != 1)
	    			this.mon2.move(this.player.getPosition(), squares);
	    		if (this.mon3.isAlive() && pls != 1)
	    			this.mon3.move(this.player.getPosition(), squares);
	    		if (this.mon4.isAlive() && pls != 1)
	    			this.mon4.move(this.player.getPosition(), squares);
    		}
    		
    		if (isLaunched) {
    			spellPass = this.getModel().isSpellPass(this.getView());
        		
        		if (spellPass) {
        			this.spell.move();
        			spellRect = new Rectangle(this.spell.getX()*32, this.spell.getY()*32, this.spell.getWidth(), this.spell.getHeight());
        		} else {
        			switch(this.spell.getDirection()) {
    				case DOWN:
    					this.spell.setDirection(Direction.UP);
    					break;
    				case LEFT:
    					this.spell.setDirection(Direction.RIGHT);
    					break;
    				case RIGHT:
    					this.spell.setDirection(Direction.LEFT);
    					break;
    				case UP:
    					this.spell.setDirection(Direction.DOWN);
    					break;
    				default:
    					break;
        			}
        			this.spell.move();
        		}
    		}
    		
    		/*
    		 * Repaint
    		 */
    		this.getView().getGameFrame().repaint();
    		
    		/*
    		 * Collisions between pawns
    		 */
    		if (!justNow) {
	    		if (this.player.getPosition().equals(this.spell.getPosition()) || this.player.getPosition().equals(this.spell.getOldPosition())) {
	    			this.isLaunched = false;
	    			this.spell.comeBack();
	    			this.spell.setPosition(-50, -50);
	    		}
    		}
    		
    		if (squares[this.player.getX()][this.player.getY()] instanceof CrystalBall) {
    			try {
					squares[this.player.getX()][this.player.getY()] = new Void();
					for (int i = 0; i < squares.length; i++) {
						for (int j = 0; j < squares[0].length; j++) {
							if (squares[i][j] instanceof GateC) {
								squares[i][j] = new GateO();
								squares = this.getView().getGameFrame().getSquares();
							} else if (squares[i][j] instanceof GateO) {
								squares[i][j] = new GateC();
								squares = this.getView().getGameFrame().getSquares();
							}
						}
					}
				} catch (IOException e) {
					e.printStackTrace();
				}
    		}
    		if (squares[this.player.getX()][this.player.getY()] instanceof GateO) {
				this.getView().displayMessage("easy peasy lemon squeezy", "YOU WON", JOptionPane.INFORMATION_MESSAGE);
				loop = false;
    		}
    		if (squares[this.player.getX()][this.player.getY()] instanceof Purse) {
    			try {
					squares[this.player.getX()][this.player.getY()] = new Void();
					squares = this.getView().getGameFrame().getSquares();
				} catch (IOException e) {
					e.printStackTrace();
				}
    		}
    		
    		if (this.mon1.isAlive() && this.spell.getPosition().equals(this.mon1.getPosition())
    				|| this.mon1.isAlive() && this.spell.getOldPosition().equals(this.mon1.getPosition())) {
    			this.isLaunched = false;
    			this.spell.setPosition(-50, -50);
    			this.mon1.setPosition(-100, -100);
    			this.mon1.setAlive(false);
    		}
    		if (this.mon2.isAlive() && this.spell.getPosition().equals(this.mon2.getPosition())
    				|| this.mon2.isAlive() && this.spell.getOldPosition().equals(this.mon2.getPosition())) {
    			this.isLaunched = false;
    			this.spell.setPosition(-50, -50);
    			this.mon2.setPosition(-100, -100);
    			this.mon2.setAlive(false);
    		}
    		if (this.mon3.isAlive() && this.spell.getPosition().equals(this.mon3.getPosition())
    				|| this.mon3.isAlive() && this.spell.getOldPosition().equals(this.mon3.getPosition())) {
    			this.isLaunched = false;
    			this.spell.setPosition(-50, -50);
    			this.mon3.setPosition(-100, -100);
    			this.mon3.setAlive(false);
    		}
    		if (this.mon4.isAlive() && this.spell.getPosition().equals(this.mon4.getPosition())
    				|| this.mon4.isAlive() && this.spell.getOldPosition().equals(this.mon4.getPosition())) {
    			this.isLaunched = false;
    			this.spell.setPosition(-50, -50);
    			this.mon4.setPosition(-100, -100);
    			this.mon4.setAlive(false);
    		}
    		
    		if (this.mon1.isAlive() && this.player.getPosition().equals(this.mon1.getPosition())
    				|| this.mon2.isAlive() && this.player.getPosition().equals(this.mon2.getPosition())
    	    		|| this.mon3.isAlive() && this.player.getPosition().equals(this.mon3.getPosition())
    	    		|| this.mon4.isAlive() && this.player.getPosition().equals(this.mon4.getPosition())
    	    		|| this.mon1.isAlive() && this.player.getOldPosition().equals(this.mon1.getPosition())
    	    		|| this.mon2.isAlive() && this.player.getOldPosition().equals(this.mon2.getPosition())
    	    		|| this.mon3.isAlive() && this.player.getOldPosition().equals(this.mon3.getPosition())
    	    		|| this.mon4.isAlive() && this.player.getOldPosition().equals(this.mon4.getPosition())) {
    			this.getView().displayMessage("Try again!", "GAME OVER", JOptionPane.ERROR_MESSAGE);
    			loop = false;
    		}
    		if (this.boss.isAlive() && rect.intersects(myRect)) {
    			// TODO collision player/boss
    			this.getView().displayMessage("Try again!", "GAME OVER", JOptionPane.ERROR_MESSAGE);
    			loop = false;
    		}
    		
    		if (this.boss.isAlive() && rect.intersects(spellRect)) {
    			// TODO collision spell/boss
    		}
    		
    		/*
    		 * Thread pause
    		 */
    		try {
				Thread.sleep(150);
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
    	}
    	this.getView().getGameFrame().dispose();
    }

	@Override
	public void keyPressed(KeyEvent key) {
		this.getEventPerformer().eventPerform(key);
	}

	@Override
	public void keyReleased(KeyEvent key) {
		// NOTHING
	}

	@Override
	public void keyTyped(KeyEvent key) {
		// NOTHING
	}
}
