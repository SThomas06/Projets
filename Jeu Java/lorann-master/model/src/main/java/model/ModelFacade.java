package model;

import java.awt.Point;
import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Observable;

import controller.Order;
import model.dao.LevelDAO;
import model.pawns.*;
import showboard.IPawn;
import showboard.ISquare;
import showboard.squares.Unpassable;
import view.IView;

/**
 * <h1>The Class ModelFacade provides a facade of the Model component.</h1>
 *
 * @author Jean-Aymeric DIET jadiet@cesi.fr
 * @version 1.0
 */

public final class ModelFacade extends Observable implements IModel {
	
	private Player player;
	private Monster1 mon1;
	private Monster2 mon2;
	private Monster3 mon3;
	private Monster4 mon4;
	private Thibault boss;
	private Spell spell;
	
    /**
     * Instantiates a new model facade.
     */
    public ModelFacade() {
        super();
    }
    
    @Override
    public List<Level> getTraining() throws SQLException {
        return LevelDAO.getTraining();
    }
    
    @Override
    public List<Level> getLevel1() throws SQLException {
        return LevelDAO.getLevel1();
    }
    
    @Override
    public List<Level> getLevel2() throws SQLException {
        return LevelDAO.getLevel2();
    }
    
    @Override
    public List<Level> getLevel3() throws SQLException {
        return LevelDAO.getLevel3();
    }
    
    @Override
    public List<Level> getLevel4() throws SQLException {
        return LevelDAO.getLevel4();
    }
    
    @Override
    public List<Level> getLevel5() throws SQLException {
        return LevelDAO.getLevel5();
    }
    
    @Override
    public List<Level> getFinalLevel() throws SQLException {
        return LevelDAO.getFinalLevel();
    }
    
    @Override
    public ArrayList<IPawn> setPawns(List<Level> level) {
    	ArrayList<IPawn> list = new ArrayList<>();
    	try {
    		this.spell = new Spell(Direction.NEUTRAL, new Point(-192, -192));
	    	list.add(this.spell);
	    	for (int i = 0; i < level.size(); i++) {
	    		for (int j = 0; j < level.get(0).getLine().size(); j++) {
	    			switch (level.get(i).getLine().get(j)) {
	    			case 3:
	    				player = new Player(Direction.NEUTRAL, new Point(j, i));
	    				break;
	    			case 9:
	    				this.mon1 = new Monster1(Direction.NEUTRAL, new Point(j, i));
	    				break;
	    			case 10:
	    				this.mon2 = new Monster2(Direction.NEUTRAL, new Point(j, i));
	    				break;
	    			case 11:
	    				this.mon3 = new Monster3(Direction.NEUTRAL, new Point(j, i));
	    				break;
	    			case 12:
	    				this.mon4 = new Monster4(Direction.NEUTRAL, new Point(j, i));
	    				break;
	    			case 13:
	    				this.boss = new Thibault(Direction.NEUTRAL, new Point(j, i));
	    				break;
	    			default:
	    				break;
	    			}
	    		}
	    	}
	    	if (this.mon1 == null) {
	    		this.mon1 = new Monster1(Direction.NEUTRAL, new Point(-100, -100));
	    		this.mon1.setAlive(false);
	    	}
	    	if (this.mon2 == null) {
	    		this.mon2 = new Monster2(Direction.NEUTRAL, new Point(-100, -100));
	    		this.mon2.setAlive(false);
	    	}
	    	if (this.mon3 == null) {
	    		this.mon3 = new Monster3(Direction.NEUTRAL, new Point(-100, -100));
	    		this.mon3.setAlive(false);
	    	}
	    	if (this.mon4 == null) {
	    		this.mon4 = new Monster4(Direction.NEUTRAL, new Point(-100, -100));
	    		this.mon4.setAlive(false);
	    	}
	    	if (this.boss == null) {
	    		this.boss = new Thibault(Direction.NEUTRAL, new Point(-100, -100));
	    		this.boss.setAlive(false);
	    	}
	    	list.add(player);
	    	list.add(this.mon1);
	    	list.add(this.mon2);
			list.add(this.mon3);
			list.add(this.mon4);
			list.add(this.boss);
    	} catch (IOException e) {
    		e.printStackTrace();
    	}
    	return list;
    }
    
	@Override
	public void move(Order order, IView view) {
		ISquare temp;
		switch (order) {
		case UP:
			this.player.setDirection(Direction.UP);
			temp = view.getGameFrame().getSquares()[this.player.getX()][this.player.getY()-1];
			break;
		case LEFT:
			this.player.setDirection(Direction.LEFT);
			temp = view.getGameFrame().getSquares()[this.player.getX()-1][this.player.getY()];
			break;
		case DOWN:
			this.player.setDirection(Direction.DOWN);
			temp = view.getGameFrame().getSquares()[this.player.getX()][this.player.getY()+1];
			break;
		case RIGHT:
			this.player.setDirection(Direction.RIGHT);
			temp = view.getGameFrame().getSquares()[this.player.getX()+1][this.player.getY()];
			break;
		default:
			temp = null;
			break;
		}
		if (!(temp instanceof Unpassable))
			this.player.move();
	}

	@Override
	public boolean isSpellPass(IView view) {
		ISquare temp;
		switch (this.spell.getDirection()) {
		case UP:
			temp = view.getGameFrame().getSquares()[this.spell.getX()][this.spell.getY()-1];
			break;
		case RIGHT:
			temp = view.getGameFrame().getSquares()[this.spell.getX()+1][this.spell.getY()];
			break;
		case DOWN:
			temp = view.getGameFrame().getSquares()[this.spell.getX()][this.spell.getY()+1];
			break;
		case LEFT:
			temp = view.getGameFrame().getSquares()[this.spell.getX()-1][this.spell.getY()];
			break;
		default:
			temp = null;
			break;
		}
		if (temp instanceof Unpassable)
			return false;
		else
			return true;
	}
}
