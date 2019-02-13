package model.pawns;

import java.awt.Image;
import java.awt.Point;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;

import model.Direction;

public class Player extends Mobile {
    
	private Point oldPos;
	private byte resetDir;
    
	public Player(Direction direction, Point position) throws IOException {
		super(direction, position, new Image[] {ImageIO.read(new File("../sprites/lorann_u.png")),
												ImageIO.read(new File("../sprites/lorann_ur.png")),
												ImageIO.read(new File("../sprites/lorann_r.png")),
												ImageIO.read(new File("../sprites/lorann_br.png")),
												ImageIO.read(new File("../sprites/lorann_b.png")),
												ImageIO.read(new File("../sprites/lorann_bl.png")),
												ImageIO.read(new File("../sprites/lorann_l.png")),
												ImageIO.read(new File("../sprites/lorann_ul.png"))});
		this.nbrImages = 8;
		this.resetDir = 3;
		this.oldPos = new Point(this.getPosition());
	}
	
	public void refresh() {
		this.resetDir--;
		this.animate();
		this.oldPos = new Point(this.getPosition());
	}
	
	public Point getOldPosition() {
		return this.oldPos;
	}

	@Override
	public Image getImage() {
		if (resetDir <= 0) {
			return super.getImage();
		} else {
			short index;
			
			switch (this.direction) {
			case UP:
				index = 0;
				break;
			case LEFT:
				index = 6;
				break;
			case DOWN:
				index = 4;
				break;
			case RIGHT:
				index = 2;
				break;
			default:
				index = 2;
				break;
			}
			return this.images[index];
		}
	}
	
	@Override
	public void setDirection(Direction direction) {
		super.setDirection(direction);
		this.resetDir = 3;
	}

	@Override
	public void moveUp() {
		super.moveUp();
	}

	@Override
	public void moveDown() {
		super.moveDown();
	}

	@Override
	public void moveRight() {
		super.moveRight();
	}

	@Override
	public void moveLeft() {
		super.moveLeft();
	}
	
	
}
