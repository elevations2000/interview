# This is a snippet of the code I wrote for an API I built an iOs app utilized that was submitted to the app store. 
# The app would save user generated and reviewed coffee shops to the database I created in Postgres.

class EstablishmentsController < ApplicationController
  # Before these functions can be processed, user token must be authenticated against token in database
  before_action :authenticate_with_token!, only: [:index, :show, :update]

  # Function that creates a coffee shop to save to the database 
  def create
    @establishment = Establishment.new(name: params[:name],
                                       street_address: params[:street_address],
                                       city: params[:city],
                                       state: params[:state],
                                       zip_code: params[:zip_code],
                                       coffee_quality: params[:coffee_quality],
                                       wifi: params[:wifi],
                                       price: params[:price],
                                       ambiance: params[:ambiance])
    # If @establishment.save returns true, then API will render json data of the newly created establishment in the database.
    if @establishment.save
      # render json "register.json.jbuilder", status: :created
      render json: { establishment: @establishment.as_json(only: [:id,
                                                                  :name, 
                                                                  :street_address, 
                                                                  :city, 
                                                                  :state,
                                                                  :zip_code,
                                                                  :coffee_quality,
                                                                  :wifi,
                                                                  :price,
                                                                  :ambiance]) },
      status: :created
    else
      # Otherwise, if @establishment.save returns anything other than true, then API will return error messages associated with the request
      render json: { errors: @user.errors.full_messages },
        status: :unprocessable_entity
    end
  end

  # Function that returns all of the coffee shops in the database.
  def index
    @establishments = Establishment.all
    render 'index.json.jbuilder', status: :ok
  end

  # Function that shows one particular coffee shop based on the id passed through in a parameter from the iOs app.
  def show 
    @establishment = Establishment.find_by(id: params[:id])
    if @establishment
    # render json "register.json.jbuilder", status: :created
    render json: { establishment: @establishment.as_json(only: [:name, :street_address,
                                                                :city, :state,
                                                                :zip_code, :coffee_quality,
                                                                :ambiance, :price,
                                                                :wifi?]) },
      status: :ok
    end
  end


  # Function that would update a particular coffee shop in the database.
  def update
    attributes = set_attributes(params)
    @establishment = Establishment.find_by(id: params[:id])
    new_ratings = update_ratings(params, @establishment)
    attributes.merge!(new_ratings)
    if @establishment.update(attributes)
      render json: { establishment: @establishment.as_json(except: [:created_at, :updated_at]) }, status: :ok
    else
      render json: { errors: "There was an issue with the attributes you tried to update." }, 
                    status: :unproccessable_entity
    end
  end

  # Function that searches through the database for coffee shops that fit the parameters given by the iOs app.
  def search
    @establishments = Establishment.where(nil) # creates an anonymous scope
    @establishments = @establishments.wifi(params[:wifi]) if params[:wifi].present?
    @establishments = @establishments.ambiance(params[:ambiance]) if params[:ambiance].present?
    @establishments = @establishments.price(params[:price]) if params[:price].present?
    @establishments = @establishments.coffee_quality(params[:coffee_quality]) if params[:coffee_quality].present?
    @establishments = @establishments.sample
    # @establishments = @establishments.page(params[:page]).per(params[:per])
    render json: @establishments, status: :ok
  end

  # Function to delete a coffee shop
  def delete
    @establishment = Establishment.find_by(id: params[:id])
    if @establishment.destroy
        render json: { message: "Establishment has been deleted." }, status: :no_content
    end
  end
  

  private 
  # Set the attributes to use when updating a coffee shop object in the database.
  def set_attributes(params)
    attributes = { }
    list = [:name, :street_address, :city,
      :state, :zip_code]
    list.each do |l|
      if params[l]
        attributes.merge!(l => params[l])
      end
    end
    attributes
  end

  # Gets the current rating and add the new rating then divides by 2 to get the new average rating
  def update_ratings(params, establishment)
    updated_ratings = { }
    list = [:coffee_quality, :price, :ambiance, :wifi]
    list.each do |l|
      if params[l]
        new_rating = (establishment[l] + params[l].to_f)/2
        updated_ratings.merge!(l => new_rating)
      end
    end
    updated_ratings
  end

end