package model.pawns;

import java.awt.Dimension;
import java.awt.Image;
import java.awt.Point;

import model.Direction;
import showboard.IPawn;

public abstract class Mobile implements IPawn {
	protected Direction direction;
	protected int nbrImages;
	protected Point position;
	protected Dimension dimension;
	protected Image[] images;
	protected int a;
	protected boolean isAlive;
	protected short hasMoved;
	
	public Mobile(Direction direction, Point position, Image[] images) {
		this.direction = direction;
		this.position = position;
		this.images = images;
		this.dimension = new Dimension(32, 32);
		this.nbrImages = 1;
		this.a = 0;
		this.setAlive(true);
		this.hasMoved = 0;
	}
	
	public Direction getDirection() {
		return this.direction;
	}
	
	public void setDirection(Direction direction) {
		this.direction = direction;
	}
	
	@Override
	public Dimension getDimension() {
		return dimension;
	}
	
	public int getWidth() {
		return (int)this.dimension.getWidth();
	}

	public int getHeight() {
		return (int)this.dimension.getHeight();
	}
	
	public void move() {
		switch(this.direction) {
    	case UP:
    		this.moveUp();
    		break;
    	case DOWN:
    		this.moveDown();
    		break;
    	case RIGHT:
    		this.moveRight();
    		break;
    	case LEFT:
    		this.moveLeft();
    		break;
		default:
			break;
    	}
	}
	
	public void moveUp() {
		this.setPosition((int)position.getX(), (int)position.getY()-1);
	}
	
	public void moveDown() {
		this.setPosition((int)position.getX(), (int)position.getY()+1);
	}
	
	public void moveRight() {
		this.setPosition((int)position.getX()+1, (int)position.getY());
	}
	
	public void moveLeft() {
		this.setPosition((int)position.getX()-1, (int)position.getY());
	}

	@Override
	public Image getImage() {
		return images[a];
	}

	@Override
	public int getX() {
		return (int) position.getX();
	}

	@Override
	public int getY() {
		return (int) position.getY();
	}

	@Override
	public Point getPosition() {
		return position;
	}
	
	public void setPosition(int x, int y) {
		this.position.setLocation(x, y);
	}
	
	public void setPosition(Point point) {
		this.position.setLocation(point);
	}
	
	@Override
	public int getNbrImages() {
		return this.nbrImages;
	}
	
	@Override
	public void animate() {
		a++;
		if (a >= this.nbrImages) {
			a = 0;
		}
	}
	
	public boolean isAlive() {
		return this.isAlive;
	}

	public void setAlive(boolean alive) {
		this.isAlive = alive;
	}
}
